<!-- START: Sidebar -->
<aside class="fixed z-50 w-[360px] bg-stream-dark">
    <div class="flex flex-col p-12 border-r border-softpur overflow-y-auto h-screen">
        <a href="/">
            <img src="{{ asset('stream/assets/images/stream.svg') }}" alt="">
        </a>
        <div class="links flex flex-col mt-16 gap-2">
            <a href="{{ route('member.dashboard') }}" class="side-link text-white hover:bg-[#3D3762]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 17L12 22L22 17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M2 12L12 17L22 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                Watch
            </a>
            <a href="{{ route('favorite.movie') }}" class="side-link text-white hover:bg-[#3D3762]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.84 4.60999C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.60999L12 5.66999L10.94 4.60999C9.9083 3.5783 8.50903 2.9987 7.05 2.9987C5.59096 2.9987 4.19169 3.5783 3.16 4.60999C2.1283 5.64169 1.54871 7.04096 1.54871 8.49999C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7563 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.49999C22.4518 7.77751 22.3095 7.0621 22.0329 6.39464C21.7563 5.72718 21.351 5.12075 20.84 4.60999V4.60999Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                My Favorites
                {{-- <span
                    class="bg-[#6EC2DF] text-[#1E5062] text-base rounded-full font-semibold text-center px-[7px] py-[1px]">6</span> --}}
            </a>
            <a href="{{ route('member.playlists') }}" class="side-link text-white hover:bg-[#3D3762]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 7L16 12L23 17V7Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M14 5H3C1.89543 5 1 5.89543 1 7V17C1 18.1046 1.89543 19 3 19H14C15.1046 19 16 18.1046 16 17V7C16 5.89543 15.1046 5 14 5Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Playlist
            </a>
            <div class="flex border-t border-softpur"></div>
            <a href="{{ route('member.user_premium.index') }}" class="side-link text-white hover:bg-[#3D3762]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 4H3C1.89543 4 1 4.89543 1 6V18C1 19.1046 1.89543 20 3 20H21C22.1046 20 23 19.1046 23 18V6C23 4.89543 22.1046 4 21 4Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M1 10H23" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Subscription
            </a>
            <a href="{{ route('account.setting', Auth::user()->id) }}" class="side-link text-white hover:bg-[#3D3762]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Account Settings
            </a>
            <a href="{{ route('member.logout') }}" class="side-link text-white hover:bg-[#3D3762]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M18.36 6.64001C19.6184 7.8988 20.4753 9.50246 20.8223 11.2482C21.1693 12.994 20.9909 14.8034 20.3096 16.4478C19.6284 18.0921 18.4748 19.4976 16.9948 20.4864C15.5148 21.4752 13.7749 22.0029 11.995 22.0029C10.2151 22.0029 8.47515 21.4752 6.99517 20.4864C5.51519 19.4976 4.36164 18.0921 3.68036 16.4478C2.99909 14.8034 2.82069 12.994 3.16772 11.2482C3.51475 9.50246 4.37162 7.8988 5.63 6.64001"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 2V12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Log Out
            </a>
        </div>
    </div>
</aside>
<!-- END: Sidebar -->
