<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Messages</title>
</head>
<body>
<div class="flex justify-center">
    <h1 class="text-2xl font-bold mb-4">Messages</h1>
</div>

<div class="flex justify-center mb-8">
    <form action="{{ route('messages.store') }}" method="POST" class="w-full max-w-md bg-white shadow-md rounded-lg overflow-hidden">
        @csrf
        <div class="flex items-center py-2 px-4">
            <label for="name" class="w-24 font-bold">Name:</label>
            <input type="text" name="name" id="name" class="flex-1 ml-2 py-1 px-2 rounded border" value="{{ old('name') }}" required>
        </div>
        <div  class="flex items-center py-2 px-4">
            @error('name')
            <div class="text-red-500 ml-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-center py-2 px-4">
            <label for="email" class="w-24 font-bold">Email:</label>
            <input type="email" name="email" id="email" class="flex-1 ml-2 py-1 px-2 rounded border" value="{{ old('email') }}" required>
        </div>
        <div  class="flex items-center py-2 px-4">
            @error('email')
            <div class="text-red-500 ml-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-start py-2 px-4">
            <label for="message" class="w-24 font-bold">Message:</label>
            <textarea name="message" id="message" rows="4" class="flex-1 ml-2 py-1 px-2 rounded border resize-none" required>{{ old('message') }}</textarea>
        </div>
        <div  class="flex items-center py-2 px-4">
            @error('message')
            <div class="text-red-500 ml-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex justify-center mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Message
            </button>
        </div>
    </form>
</div>

<div class="flex justify-center">
    <table class="w-full max-w-7xl bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
        <tr>
            <th class="py-2 px-4 border-b">Name</th>
            <th class="py-2 px-4 border-b">Email</th>
            <th class="py-2 px-4 border-b">Message</th>
            <th class="py-2 px-4 border-b">Created at</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($messages as $message)
            <tr>
                <td class="py-2 px-4 border-b">{{ $message->name }}</td>
                <td class="py-2 px-4 border-b">{{ $message->email }}</td>
                <td class="py-2 px-4 border-b word-break break-all">{{ $message->message }}</td>
                <td class="py-2 px-4 border-b whitespace-nowrap">{{ $message->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="flex justify-center mt-4">
    {{ $messages->links('pagination::tailwind') }}
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
