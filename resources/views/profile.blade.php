<x-layout>
    <h1 class="mt-4 text-xl">Edit Profile</h1>
    <form action="/profile/{{auth()->id()}}" method="POST" enctype="multipart/form-data" class="my-4">
        @csrf 
        <div>
            <label for="" class="block">New Image</label>
            <input type="file" accept="image/*" name="image">
        </div>
        <div>
            <label for="" class="block mt-4">Name</label>
            <input type="text" name="name" value="{{auth()->user()->name}}" required>
        </div>
        <div>
            <label for="" class="block mt-4">Email</label>
            <input type="email" name="email" value="{{auth()->user()->email}}" required>
        </div>
        <div>
            <label for="" class="block mt-4">New Password</label>
            <input type="password" name="password">
        </div>
        <div class="mt-4">
            <button type="submit" class="p-2 bg-purple-700 text-white rounded">
                Save
            </button>
        </div>
    </form>
</x-layout>