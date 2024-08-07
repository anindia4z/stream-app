@extends('member.layouts.base')

@section('title', 'Watch Today')

@section('title-desc', 'Our Selected Movie For Your Mood')

@section('content')
    <!-- Subscription Stat -->
    <div class="flex items-center gap-3">
        <img src="{{ asset('stream/assets/images/ic_subscription.svg') }}" alt="">
        <div class="flex flex-col gap-2">
            <div class="text-white text-[22px] font-semibold">
                {{ ucwords($user_premium->package->name) }} Package
            </div>
            <div class="flex items-center gap-[10px]">
                <progress value="{{ $diff }}" max="30" id="diff"
                    class="w-[248px] h-[6px] bg-softpur text-[#22C58B] rounded-full"></progress>
                <style>
                    #diff::-moz-progress-bar {
                        background: #22C58B;
                    }

                    #diff::-webkit-progress-value {
                        background: #22C58B;
                    }

                    #diff {
                        color: #22C58B;
                    }
                </style>
                <div class="text-stream-gray text-sm">
                    {{ $diff }} / 30 days
                </div>
            </div>
        </div>
    </div>
    <!-- /Subscription Stat -->

    <!-- Benefits -->
    <div class="flex flex-col gap-6 font-medium text-base text-white -mt-[10px] px-[18px]">
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>{{ $user_premium->package->max_users }} Users Limits</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>Up to 8K Quality</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>All Platforms Streaming</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>900+ Movies Available</span>
        </div>
        <div class="flex gap-4 items-center">
            <img src="{{ asset('stream/assets/images/ic_check-dark.svg') }}" alt="">
            <span>120 Origin Countries</span>
        </div>
    </div>
    <!-- /Benefits -->

    <!-- Action Button -->
    <div class="flex flex-col gap-[14px] max-w-max">
        <form action="{{ route('member.transaction.store') }}" method="POST">
            @csrf
            <input type="hidden" name="packages_id" value="{{ $user_premium->package_id }}">
            <button type="submit" class="py-[13px] px-[58px] bg-[#5138ED] rounded-full text-center">
                <span class="text-white font-semibold text-base">
                    Make a Renewal
                </span>
            </button>
        </form>
        <a href="{{ route('pricing') }}"
            class="py-[13px] px-[58px] outline outline-1 outline-stream-gray outline-offset-[-3px] rounded-full text-center">
            <span class="text-stream-gray font-normal text-base">
                Change Plan
            </span>
        </a>
    </div>
    <!-- /Action Button -->

    <!-- Stop Subscribe -->
    <div class="rounded-2xl bg-[#19152E] p-[30px] w-max">
        <div class="text-xl text-red-500 font-semibold">
            Danger Zone
        </div>
        <p class="text-base text-white leading-[30px] max-w-[500px] mt-3 mb-[30px]">
            If you wish to stop subscribe our movies please continue
            by clicking the button below. Make sure that you have read our
            terms & conditions beforehand.
        </p>
        <form method="post" action="{{ route('member.user_premium.destroy', $user_premium->id) }}">
            @csrf
            @method('delete')
            <button type="submit" class="px-[19px] py-[13px] bg-[#FE4848] rounded-full text-center">
                <span class="text-white font-semibold text-base">
                    Stop Subscribe
                </span>
            </button>
    </div>
    </form>
    <!-- /Stop Subscribe -->
@endsection
