<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomWidget;
use Auth;
use App\Models\defaultWidget;
use Session;
class CustomWidgetController extends Controller
{
    public function store(Request $request)
{
          $request->validate([
            'box' => 'required',
            'color' => 'required',
            'name' => 'required|max:255',
            'default_widget_id' => 'required|exists:default_widgets,id', 
        ]);
        
        //Check the highest entry
        $maxPosition = CustomWidget::max('position');
        $nextPosition = 1;
        //Check logic if position is taken
        if ($maxPosition) {
            $nextPosition = $maxPosition + 1;
        } else {
            $nextPosition = 1;
        }

        // get the icon
        $defaultWidget = DefaultWidget::findOrFail($request->input('default_widget_id'));
        $customWidget = new CustomWidget([
            'user_id' => auth()->id(),
            'default_widget_id' => $request->default_widget_id,
            'Dashboards_id' => Session::get('dash_id'),
            'name' => $request->name,
            'color' => $request->color,
            'box' => $request->box,
            'icon' => $defaultWidget->icon, 
            'position' => $nextPosition,
        ]);
       
        $customWidget->save();
        return redirect('/home');
    
    }

    public function updatePosition(Request $request)
    {
        $request->validate([
            'widget_id' => 'required|exists:custom_widgets,id',
            'position' => 'required|integer|min:1|max:14',
        ]);
        
        $widget = CustomWidget::find($request->widget_id);
        $widget->position = $request->position;
        $widget->save();
        return response();
    }

    public function deleteWidget(Request $request)
    {
        // id of widget to select corerct one
        $widgetId = $request->input('widget_id');
        $widget = CustomWidget::find($widgetId);

        if ($widget) {
            // Delete the widget
            $widget->delete(); 
            return response()->json(['success' => true]);
        }
    }
}
