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
    <form action="/subject" class="p-8  rounded" method="POST">
        @csrf 
        <div>
            <input class="p-2 w-full mb-2 rounded shadow-lg" type="text" placeholder="Subject name" name="subject" required>
        </div>
        <div>
            <textarea class="p-2 w-full mb-2 rounded shadow-lg" name="description" required placeholder="Description"></textarea>
        </div>
        <div>
            <input class="p-2 w-full mb-2 rounded shadow-lg" type="password" placeholder="Code" name="code" required>
        </div>
        <div>
            <label for="">Select Theme</label>
            <select name="theme" id="" name="theme" class="w-full p-2 mb-2 rounded">
                <option value="red">Red</option>
                <option value="orange">Orange</option>
                <option value="yellow">Yellow</option>
                <option value="green">Green</option>
                <option value="blue">Blue</option>
                <option value="fear">Purple</option>
            </select>
        </div>
        <button class="px-4 p-2 rounded shadow-lg bg-white font-bold">
            SUBMIT
        </button>
    </form>
</x-layout>