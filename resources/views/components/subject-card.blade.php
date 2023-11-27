@props(['data'])
<div class="bg-white shadow-lg p-4 rounded-lg flex items-center justify-between">
    <div class="flex">
        <div class="w-20 rounded items-center justify-center flex text-4xl font-bold " style="background:{{$data->theme}}">
            {{$data->subject[0]}}
        </div>
        <div class="mx-2">
            <h1 class="font-bold text-xl">{{$data->subject}}</h1>
            <p class="text-sm font-thin">by <span class="font-bold">{{$data->instructor->name}}</span></p>
            <p class="font-thin text-sm">{{$data->description}}</p>
        </div>
    </div>
    @if (auth()->user()->type == 'Teacher')
    @if ($data->archived_at == null)
    <a href="/move-to-archived/{{$data->id}}" class="p-2 flex items-center bg-gray-100 rounded shadow-xl">
        <span class="material-symbols-outlined mr-2">
            archive
        </span>
        Move to archive
    </a>
    @else 
    <a href="/remove-to-archived/{{$data->id}}" class="p-2 flex items-center bg-gray-100 rounded shadow-xl">
        <span class="material-symbols-outlined mr-2">
            archive
        </span>
        Remove to archive
    </a>
    
    @endif
    @endif
</div>