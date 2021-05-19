<div>
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
                        <div class="text-sm font-medium text-gray-900">
                            {{ $name }}
                        </div>
                    </div>
                </div>
            </td>
            @isset($key)
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $key }}</div>
                </td>
            @endisset
            @isset($description)
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $description }}</div>
                </td>
            @endisset
            @isset($date)
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $date }}
                </td>
            @endisset
            @isset($status)
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $status }}
                </td>
            @endisset
            @isset($score)
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $score }}
                </td>
            @endisset
            @isset($homework)
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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

</div>
