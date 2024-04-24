<div>
    <h1>Update your profile</h1>
    <form wire:submit="save">
        <label>
            <h3>Username</h3>
            <input wire:model.blur="form.name" type="text"/>
            @error('form.name')
                <p style="color:red;">{{$message}}</p>
            @enderror
        </label>
        <label>
            <h3>Email</h3>
            <textarea wire:model="form.email" rows="4"></textarea>
        </label>
        <div class="flex">
            <button type="submit">Submit
                <div wire:loading.flex wire:target="save">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 17 17" >
                        <style type="text/css">
                            .st0{fill:#000000;}
                        </style>
                        <path id="arrow" class="st0" d="M9.3,16.4c3.2-0.4,5.8-2.9,6.2-6.1c0.5-4.2-2.8-7.7-6.9-7.8V0.6c0-0.1-0.1-0.2-0.2-0.1l-4,2.9
    	c-0.1,0-0.1,0.1,0,0.2l3.9,2.8c0.1,0.1,0.2,0,0.2-0.1V4.5c2.9,0,5.2,2.5,5,5.4c-0.2,2.5-2.2,4.5-4.8,4.7c-2.7,0.2-5-1.7-5.4-4.2
    	c-0.1-0.5-0.5-0.8-1-0.8c-0.6,0-1,0.5-1,1.1C2.1,14.2,5.4,16.9,9.3,16.4L9.3,16.4z">

                            <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="360 8.4 9.5" to="0 8.4 9.5" dur="0.5s" additive="sum" repeatCount="indefinite" />
                        </path>
                    </svg>
                </div>
            </button>
        </div>
    </form>

    <div style="color:green;"
         x-show="$wire.showSuccess"
         x-transition.out.opacity.duration.2000ms
         x-effect="if($wire.showSuccess) setTimeout(() => $wire.showSuccess = false ,3000)"
    >
        Profile update success!!
    </div>
</div>
