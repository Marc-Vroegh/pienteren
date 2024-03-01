@extends('layouts.app')

@section('sidebar')
    @parent
@endsection
@section('content')
    <div style="width: 300px; height: 300px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 300px; height: 300px;" id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
    <div style="width: 278px; height: 278px;" id="drag1" draggable="true" ondragstart="drag(event)" class="container p-2 bg-gray-200">
    <h1>Temperatuur</h1>
    <div style="margin-left: -20px; margin-top: 65px;" class="flex justify-center items-center">
        <i style="font-size: 100px;" class="bi bi-thermometer"></i>
        <h1>29 graden</h1>
        </div>
    </div>
    
@endsection