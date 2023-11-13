@props(['data'])
@forelse ($data->materials()->latest()->get() as $item)
    <div>
        <div class="p-4 shadow-lg bg-white rounded mb-4">
            <h1 class="text-lg">{{$item->created_at->diffForHumans()}}</h1>
            <div class="font-thin text-sm px-4">
                {{$item->description}}
            </div>
            <div class="text-right">
                <a href="/subject-material/{{$item->id}}" class="px-4 p-2 shadow-lg font-bold bg-gray-100 rounded">VIEW</a>
            </div>
        </div>
    </div>
@empty
    <div class="text-center text-2xl h-24 flex items-center justify-center text-gray-500">No material has been uploaded.</div>
@endforelse