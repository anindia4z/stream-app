<!-- Navbar -->
<div class="flex justify-between items-center">
    <div class="flex flex-col gap-[10px]">
        <div class="font-bold text-[32px] text-white">
            @yield('title')
        </div>
        <p class="mb-0 text-stream-gray text-base">@yield('title-desc')</p>
    </div>
    <div class="flex items-center gap-[26px]">
        <span class="text-white text-base">Welcome, {{ ucwords(auth()->user()->name) }}</span>
        <!-- user avatar -->
        <div class="collapsible-dropdown flex flex-col gap-2 relative">
            <a href="#!"
                class="outline outline-2 outline-stream-gray p-[6px] rounded-full w-[60px] h-[60px] flex items-center justify-center dropdown-button"
                data-target="#dropdown-stream">
                @if (auth()->user()->avatar != null)
                    <img id="navbarImagePreview" src="{{ asset('storage/profile/' . (auth()->user()->avatar)) }}" alt="Profile Picture"
                        class="rounded-full w-full h-full object-cover border-2 border-white">
                @else
                    <img id="navbarImagePreview" src="{{ asset('stream/assets/images/userr.jpg') }}" alt="Profile Picture"
                        class="rounded-full w-full h-full object-cover border-2 border-white">
                @endif
                {{-- <img id="navbarImagePreview" src="{{ asset('storage/profile/' . (auth()->user()->avatar)) }}" alt="Profile Picture"
                    class="rounded-full w-full h-full object-cover border-2 border-white"> --}}
            </a>
            <div class="bg-white rounded-2xl text-stream-dark font-medium flex flex-col gap-1 absolute z-[999] right-0 top-[80px] min-w-[180px] hidden overflow-hidden"
                id="dropdown-stream">
                <a href="{{ route('member.dashboard') }}" class="transition-all hover:bg-sky-100 p-4">Watch</a>
                <a href="{{ route('account.setting', auth()->user()->id) }}"
                    class="transition-all hover:bg-sky-100 p-4">Settings</a>
                <a href="{{ route('member.logout') }}" class="transition-all hover:bg-sky-100 p-4">Sign Out</a>
            </div>
        </div>
    </div>
</div>
<!-- /Navbar -->
