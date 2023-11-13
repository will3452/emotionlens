<nav class="flex w-full justify-between  ">
    <div class="flex items-center">
        <h1 class="font-bold text-4xl">EmotionLens</h1>
    </div>
    <div class="flex items-center">
        @if (url()->current() != route('home'))
            <a href="/home">
                <span class="material-symbols-outlined">
                home
                </span>
            </a>
        @endif
        <span class="font-thin mx-4">
            Hello,
            <span class="font-bold">
                {{ auth()->user()->name }}
            </span>
        </span>
        <div class="relative" x-data="{view:false}">
            <img @click="view = ! view; console.log('gekki')" src="/profile.jpg" alt="" class="w-12 rounded-full">
            
            <template x-if="view">
                <div  class="absolute -bottom-10 bg-white p-2 shadow-lg rounded-tl-xl rounded-br-xl rounded-bl-xl -left-16">
                    <a href="/logout">Logout</a>
                </div>
            </template>
        </div>
    </div>
</nav>