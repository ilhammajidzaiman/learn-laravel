<div class="table-responsive-md">
    <table {{ $attributes->merge(['class' => 'table table-hover']) }}>
        {{ $slot }}
    </table>
</div>
