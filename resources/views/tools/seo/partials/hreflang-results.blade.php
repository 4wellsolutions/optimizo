<div class="mt-4" id="results-area">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Results for: <a href="{{ $url }}" target="_blank" class="text-purple-600 hover:underline">{{ $url }}</a></h3>
    
    @if(count($results) > 0)
        <div class="overflow-x-auto border rounded-xl">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-700 uppercase font-bold text-xs">
                    <tr>
                        <th class="px-4 py-3">Language (Hreflang)</th>
                        <th class="px-4 py-3">URL</th>
                        <th class="px-4 py-3">Source</th>
                        <th class="px-4 py-3">Return Tag Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($results as $tag)
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="px-4 py-3 font-mono text-purple-600 font-bold">{{ $tag['hreflang'] }}</td>
                            <td class="px-4 py-3 font-mono text-gray-600 break-all max-w-xs">
                                <a href="{{ $tag['url'] }}" target="_blank" class="hover:underline flex items-center gap-1">
                                    {{ $tag['url'] }}
                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $tag['source'] }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if($tag['return_tag_found'])
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Valid
                                    </span>
                                @elseif(Str::startsWith($tag['return_tag_status'], 'Valid'))
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        {{ $tag['return_tag_status'] }}
                                    </span>
                                @else
                                     <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                        {{ $tag['return_tag_status'] }}
                                    </span>
                                    @if($tag['http_status'] > 0)
                                        <span class="text-xs text-gray-500 ml-1">(HTTP {{ $tag['http_status'] }})</span>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">No hreflang tags found on this page.</p>
                </div>
            </div>
        </div>
    @endif
</div>
