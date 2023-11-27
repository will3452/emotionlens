<nav class="flex w-full justify-between  ">
    <div class="flex items-end">
        <h1 class="font-bold text-4xl">EmotionLens</h1> <span class="mx-2 text-gray-800">You're login as <span class="font-bold">{{auth()->user()->type}}</span></span>
    </div>
    <div class="flex items-center">
        @if (url()->current() != route('home'))
        
        @endif
        <div class="{{url()->current() == route('home') ? 'underline underline-offset-2 ': ''}} px-2">
            <a href="/home">
                Home
            </a>
        </div>
        <div class="{{url()->current() == route('profile',['user' => auth()->id()]) ? 'underline underline-offset-2 ': ''}} px-2">
            <a href="/profile/{{auth()->id()}}">Profile</a>
        </div>
        <div class=" px-2">
            <a href="/logout">Logout</a>
        </div>
        <span class="font-thin px-2">
            Hello,
            <span class="font-bold">
                {{ auth()->user()->name }}
            </span>
        </span>
        <div class="relative" x-data="{view:false}">
            <img @click="view = ! view;" src="{{auth()->user()->image ? "/".str_replace('public', 'storage', auth()->user()->image) : '/profile.jpg'}}" alt="" class="w-12 h-12 rounded-full">
            
            <template x-if="view">
                <div  class="absolute -bottom-10 bg-white p-2 shadow-lg rounded-tl-xl rounded-br-xl rounded-bl-xl -left-16">
                    <a href="/logout">Logout</a>
                </div>
            </template>
        </div>
    </div>
</nav>