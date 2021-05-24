<div>

    <div class="sombra1">
        <!-- This example requires Tailwind CSS v2.0+ -->
    
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full"
                            src="{{$image}}"
                            alt="">
                        </div>
                    <div class="ml-4">
                        <div class="text-s font-medium text-gray-900">
                            {{ $name }}
                        </div>
                    </div>
                </div>
            </td>
            @isset($key)
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-s text-gray-900">{{ $key }}</div>
                </td>
                @endisset
                @isset($description)
                <td class="px-6 py-4 whitespace-nowrap">
                    
                    
                    <div class="item  py-6" x-data="{isOpen : false}">
                        <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                            <h4 style="font-weight: 900;" :class="{'text-blue-600 font-bold' : isOpen == true}"> {{$name}}</h4>
                            <svg class="w-5 h-5 text-black-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <div style="font-size: small ;" x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-black-600' : isOpen == true}">
                            <div class="text-s text-gray-900">{{ $description }}</div>
                        </div>
                        
                    </div>
                    
                    
                    
                    
                </td>
                @endisset
                @isset($date)
                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                    {{ $date }}
                </td>
                @endisset
                @isset($status)
                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                    {{ $status }}
                </td>
                @endisset
                @isset($score)
                <td class="px-6 py-4 whitespace-nowrap text-s text-gray-500">
                    {{ $score }}
                </td>
                @endisset
                @isset($homework)
                <td class="px-6 py-4 whitespace-nowrap text-right text-s font-medium">
                    @isset($key)
                    <a href="{{ route('clases.tareas.students.review', [$lesson, $homework,$key]) }}"
                    class="text-indigo-600 hover:text-indigo-900">Ver</a>
                    
                    @else
                    <a href="{{ route('clases.tareas.show', [$lesson, $homework]) }}"
                    class="text-indigo-600 hover:text-indigo-900">Ver</a>
                    @endisset
                </td>
                @endisset
            </tr>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
</div>

        </div>