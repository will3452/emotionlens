<x-layout>
    <a href="/home" class="inline-block p-2 bg-white shadow-lg rounded-full text-sm font-bold px-4 mb-2">
        <span class="flex items-center">
            <span class="material-symbols-outlined">
                arrow_back
                </span>
            <span class="ml-4">
                BACK
            </span>
        </span>
    </a>
    @if (request()->has('code') && request()->code != $subject->code)
        <p class="font-thin text-red-600 text-sm">Invalid code, please contact your teacher.</p>
    @endif
    @if (request()->code != $subject->code)
        <form action="{{url()->current()}}" class="mt-4">
            <input type="password" name="code" class="p-2 border rounded" placeholder="Enter Secret code."> <button class="bg-white text-gray-800 bg-gray-300 p-2 font-bold rounded">APPLY</button>
        </form>
    @else 
        <div class="my-4"></div>
        <x-subject-card :data="$subject"></x-subject-card>
        @if (auth()->user()->type == 'Teacher')
        <form  action="/subject-material" method="POST" class="bg-white p-4 my-4 rounded shadow-lg"  enctype="multipart/form-data">
            <h1 class="font-bold text-gray-900 text-lg">Upload Material</h1>
            @csrf 
            <input type="hidden" name="subject_id" value="{{$subject->id}}">
                <input type="text" name="description" required placeholder="Description" class="w-full rounded border-2  p-2 my-4" />
                <input type="file" name="file" accept="application/pdf"/>
                
                <input type="text" name="video_link"  placeholder="Youtube video ID" class="w-full rounded border-2  p-2 my-4" />
               <div>
                    <img src="/vl.png" alt="" class="w-64">
               </div>
                <button class="px-4 p-2 shadow-lg font-bold bg-gray-100 rounded">SUBMIT</button>
        </form>
        @else 
        <br>
        @endif
        <x-subject-material-list :data="$subject"></x-subject-material-list>
    @endif
</x-layout>