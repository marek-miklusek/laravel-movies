<x-master-layout> 
    <div class="bg-black bg-opacity-60 py-12">
        <div class="max-w-xl mt-16 mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-black bg-opacity-50 p-4 sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="bg-black bg-opacity-50 p-4 sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-black bg-opacity-50 p-4 sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
