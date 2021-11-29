<div>
    {{-- The Master doesn't talk, he acts. --}}
    <section >
        <div class="px-4 py-16 mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:py-12 lg:col-span-2">


                    <div class="mt-8 bg-black py-4 px-4 border-double border-4 border-purple-400 rounded">
                        <a href="" class="text-2xl font-bold text-blue-600"> Add A New Note Here </a>

                        <address class="mt-2 text-white not-italic">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam iure perspiciatis vero officia a maxime reprehenderit autem natus assumenda,
                            facere, tempore harum. Sint reiciendis, ea dicta ducimus fugiat impedit pariatur.</address>
                    </div>
                </div>

                <div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <div>
                            <label class="sr-only" for="Name">Name</label>
                            <input class="w-full p-3 text-sm border-gray-200 rounded-lg" 
                            placeholder="Name"
                            type="text" wire:model="name" id="Name" />
                        </div>

                        <div>
                            <label class="sr-only" for="email">Email</label>
                            <input class="w-full p-3 text-sm border-gray-200 rounded-lg"
                            placeholder="Email Address"
                            wire:model="email" type="email" id="email" />
                        </div>

                    </div>


                    <div>
                        <label class="sr-only" for="message">Notes</label>
                        <textarea wire:model="note" class="w-full p-3 text-sm border-gray-200  rounded-lg"
                                    placeholder="Notes"
                                rows="8" id="Notes"></textarea>
                    </div>
                    @if ($edit_mode == false)
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="create_note"
                                class="inline-flex items-center justify-center hover:bg-purple-600 w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto">
                                <span class="font-medium"> Add Note </span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    @else
                        <div class="mt-4">
                            <button type="submit" wire:click.prevent="update"
                                class="inline-flex items-center justify-center w-full px-5 py-3 hover:bg-purple-600 text-white bg-black rounded-lg sm:w-auto">
                                <span class="font-medium"> Update Note </span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="flex flex-col">
        <div class="-my-2 mx-auto">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div
                    class="
            shadow
            overflow-hidden
            border-b border-gray-200
            sm:rounded-lg
          ">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-800">
                            <tr>
                                <th scope="col"
                                    class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-white
                    uppercase
                    tracking-wider
                  ">
                                    Name
                                </th>
                                <th scope="col"
                                    class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-white
                    uppercase
                    tracking-wider
                  ">
                                    Email
                                </th>
                                <th scope="col"
                                    class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-white
                    uppercase
                    tracking-wider
                  ">
                                    Notes
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($notes as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $item['name'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">
                                            {{ $item['email'] }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $item['note'] }}
                                    </td>
                                    <td
                                        class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-right text-sm
                    font-medium
                  ">
                                        <a href="#"
                                            wire:click.prevent="edit('{{ $item['id'] }}','{{ $item['name'] }}','{{ $item['email'] }}','{{ $item['note'] }}')"
                                            class="text-indigo-600 hover:text-red-500">Edit</a>
                                    </td>
                                    <td
                                        class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-right text-sm
                    font-medium
                  ">
                                        <a href="#" wire:click.prevent="delete_note({{ $item['id'] }})"
                                            class="text-indigo-600 hover:text-red-500">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
