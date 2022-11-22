<section class="flex flex-1 flex-col">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
        <p class="mt-1 text-sm text-gray-600">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="flex flex-1 flex-col mt-6 space-y-6">
        @csrf
        @method('put')

        <x-form-input name="current_password" label="Current Password" :errors="$errors" value="" />
        <x-form-input name="password" label="New Password" :errors="$errors" value="" />
        <x-form-input name="password_confirmation" label="Confirm Password" :errors="$errors" value="" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Saved.</p>
            @endif
        </div>
    </form>
</section>