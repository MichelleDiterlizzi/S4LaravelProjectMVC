<div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:scale-105">
    <a href="{{ route('events.show', $event->id) }}" class="block">
        <div class="h-40 bg-gray-200">
            @if ($event->image)
                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $event->image) }}" alt="Imagen de {{ $event->title }}">
            @else
                <img class="w-full h-full object-cover" src="{{ asset($event->category->image) }}" alt="Categoría: {{ $event->category->name }}">
            @endif
        </div>

        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate" title="{{ $event->title }}">
                {{ $event->title }}
            </h3>
            
            <p class="text-sm text-gray-600 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ $event->event_date ? $event->event_date->format('d/m/Y H:i') : 'Fecha no disp.' }}
            </p>
             <p class="text-sm font-medium mb-2">
                 @if(isset($event->price) && $event->price > 0)
                    <span class="text-green-700">Precio: ${{ number_format($event->price, 2) }}</span>
                 @else
                    <span class="text-blue-600">Gratis</span>
                 @endif
             </p>

             @if(isset($event->participants_count))
                 <p class="text-xs text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.176-5.97M15 21H9" />
                    </svg>
                    {{ $event->participants_count }} Asistentes
                 </p>
             @endif
             
        </div>
    </a>
</div>