@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="POST">
          @csrf

          <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="profile avatar" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Want to participate?</h2>
          </header>
          <div class="mt-6">
            <textarea name="body" 
                      class="w-full text-sm focus:outline-none focus:ring"  
                      rows="6" 
                      placeholder="Please, enter your comment here!"
                      required></textarea>
            
             @error ('body')
             <span class="text-sm text-red-500">{{ $message }}</span>
             @enderror

          </div>
          <div class="flex justify-end mt-6 pt-6 border-t border-green-200">
            <x-form.button>Post</x-form.button>
          </div>
        </form>
    </x-panel>
            
        @else
        <p class="font-semibold">
          <a href="/register" class="hover:underline text-green-400">Register</a> or 
          <a href="/login" class="hover:underline text-green-500">log in</a> to leave a comment.
        </p>
            
@endauth