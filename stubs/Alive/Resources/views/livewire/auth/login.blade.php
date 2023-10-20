<div class="flex justify-center items-center min-h-screen">
    <div class="max-w-md flex-grow mx-2 lg:mx-0">
        <div class="card shadow-xl border dark:border-neutral-focus bg-base-100 mb-10">
            <div class="card-body">
                <div class="mb-4">
                    <h3 class="text-2xl font-bold mb-4">{{ __('Sing In') }}</h3>
                    <p>{{ __('Please login first to access the Administrator page.') }}</p>
                </div>
                @error('form.failed')
                    <div class="alert alert-warning mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                @enderror
                <form wire:submit='attempt'>
                    <div class="form-control w-full">
                        <input type="email" wire:model='form.email' placeholder="{{ __('E-Mail Address') }}"
                            class="input input-bordered w-full" />
                        <label class="label">
                            @error('form.email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="form-control w-full">
                        <input type="password" wire:model='form.password' placeholder="{{ __('Password') }}"
                            class="input input-bordered w-full" />
                        <label class="label">
                            @error('form.password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="mb-4 flex justify-between">
                        <div class="flex items-center gap-2">
                            <input type="checkbox" wire:model='form.remember' id="remember"
                                class="checkbox checkbox-primary" />
                            <label for="remember">{{ __('Remember Me') }}</label>
                        </div>
                        <div>
                            <a href="">{{ __('Forgot password?') }}</a>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary w-full">{{ __('Sign In') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-ghost w-full" href="/" wire:navigate>&larr; Back to home</a>
        </div>

    </div>
</div>
