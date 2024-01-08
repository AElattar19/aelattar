
{{-- <script>
    window.onload = function() {
        new Noty({
            type: 'success',
            layout: "topRight",
            text: "",
            timeout: 2000,
            killer: true
        }).show();
    }

</script> --}}
@if (session()->has('add'))
<script>
    window.onload = function() {
        new Noty({
            type: 'success',
            layout: "topRight",
            text: "سسسس",
            timeout: 5000,
            killer: true
        }).show();
    };
</script>
@endif

@if (session()->has('edit'))
    <script>
        window.onload = function() {
            new Noty({
                type: 'success',
                layout: "topRight",
                text: "{{__('admin.edit successfully')}}",
                timeout: 2000,
                killer: true
            }).show();
        }

    </script>
@endif

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            new Noty({
                type: 'danger',
                layout: "topRight",
                text: "{{__('admin.delete successfully')}}",
                timeout: 2000,
                killer: true
            }).show();
        }

    </script>
@endif
