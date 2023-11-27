<x-layout>
      
        <div class="flex mt-4 justify-between">
           {{-- <form action="{{url()->current()}}" class="w-full md:w-1/3">
                <input class="px-4 p-2 rounded-full w-full" name="search" placeholder="Enter Classroom" value="{{request()->search}}" type="search">
            </form> --}}
            <div class="w-full md:w-1/3 text-sm text-gray-700">
                Recently joined class. 
            </div>
            @if (auth()->user()->type == 'Student')
            <div>
                <a class="p-2 rounded shadow-md bg-white" href="/search">Join Class</a>
            </div>
            @endif
            @if (auth()->user()->type == 'Teacher')
                <div class="flex items-center">
                    <div>
                        <a class="p-2 rounded shadow-md bg-white mr-2 " href="/search">Join Class</a>
                    </div>
                    @if(! request()->has('archived'))
                    <a title="View archive!" href="/home?archived" class="mr-2 p-2 px-4 rounded bg-white shadow-lg font-bold flex items-center">
                        <span class="material-symbols-outlined" title="ADD SUBJECT">
                            archive
                        </span>
                    </a>
                    @else 
                    <a title="View new subjects." href="/home" class="mr-2 p-2 px-4 rounded bg-white shadow-lg font-bold flex items-center">
                        <span class="material-symbols-outlined">
                            collections_bookmark
                        </span>
                    </a>
                    @endif 
                    <a href="/subject-create" class="p-2 px-4 rounded bg-white shadow-lg font-bold flex items-center">
                        <span class="material-symbols-outlined" title="ADD SUBJECT">
                            add
                        </span>
                    </a>
                </div>
            @endif
        </div>

        <div class="flex flex-wrap mt-4">
            @foreach ($subjects as $item)
                <div class=" w-full md:w-1/3 p-2 hover:scale-105 transition-all ">
                    <div   class="w-full text-ellipsis overflow-hidden  p-4  rounded-xl shadow-xl relative bg-white border-t-4" style="height:150px;border-color:{{$item->theme}}">
                        <h1 class=" uppercase text-xl">{{ $item->subject }}</h1>
                        <p class="font-thin"> {{$item->description}} </p>

                        @if ($item->archived_at == null || auth()->user()->type == 'Teacher')
                        <div class="absolute bottom-2 right-5 bg-gray-100 shadow-xl w-10 h-10 flex justify-center items-center rounded-xl">
                            <a href="/subject/{{$item->id}}" class=""><span class="material-symbols-outlined hover:rotate-45 transition-all">
                                arrow_upward
                                </span></a>
                        </div>
                        @if (auth()->id() == $item->instructor_id)
                            <div class="absolute bottom-2 right-16 bg-gray-100 shadow-xl w-10 h-10 flex justify-center items-center rounded-xl">
                                <a href="/subject-delete/{{$item->id}}" class=""><span class="material-symbols-outlined hover:rotate-45 transition-all">
                                    delete
                                    </span></a>
                            </div>
                        @endif
                        @else 
                        <p class="text-gray-400">Not available.</p>
                        @endif
                        
                    </div>
                </div>
            @endforeach
        </div>

        
        <div class="container">
            {{ $subjects->links() }}
        </div>
    
</x-layout>