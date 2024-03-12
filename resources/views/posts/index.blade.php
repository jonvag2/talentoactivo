<x-app-layout>
  <section class="bg-gray-900 text-white img">
    <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
      <div class="mx-auto max-w-3xl text-center">
        <h1
          class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl"
        >
          Understand User Flow.
  
          <span class="sm:block"> Increase Conversion. </span>
        </h1>
  
        <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
          numquam ea!
        </p>
  
        <div class="mt-8 flex flex-wrap justify-center gap-4">
          <a
            class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
            href="#"
          >
            Get Started
          </a>
  
          <a
            class="block w-full rounded border border-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
            href="#"
          >
            Learn More
          </a>
        </div>
      </div>
    </div>
  </section>
  <div class="w-full h-full object-cover object-center">
    <img class="w-full h-full object-cover object-center" src="{{Storage::url('/hero.png')}}" alt="">
    {{Storage::url('/hero.png')}}
  </div>

  
  <footer class="p-4 bg-gray-100 text-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-800">
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://jonapiscope.com" target="_blank" class="hover:underline">Creado por JonVAG™</a>. All Rights Reserved.
      </span>
  </footer>

</x-app-layout>