<div class="relative inline-flex">
  <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="language-toggle">
    @if (Illuminate\Support\Facades\App::getLocale() == 'en')
    <p>{{__('lang.en')}}</p>
      @else
      <p>{{__('lang.ka')}}</p>
    @endif

  </button>

  <div class="origin-top-right absolute right-0 mt-12 w-28 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" id="language-menu">
    <div class="py-1" aria-orientation="vertical" aria-labelledby="language-toggle">
      <a href="{{ route('setLocale', ['locale' => 'ka']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">{{__('lang.ka')}}</a>
      <a href="{{ route('setLocale', ['locale' => 'en']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">{{__('lang.en')}}</a>
    </div>
  </div>
</div>

<script>
  const toggleButton = document.getElementById('language-toggle');
  const menu = document.getElementById('language-menu');
  toggleButton.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
  const menuItems = menu.querySelectorAll('[data-value]');
  menuItems.forEach((item) => {
    item.addEventListener('click', () => {
      const selectedValue = item.getAttribute('data-value');
      menu.classList.add('hidden');
    });
  });
</script>
