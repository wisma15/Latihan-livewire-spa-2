<link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
<!--Replace with your tailwind.css once created-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
<!-- Define your gradient here - use online tools to find a gradient matching your branding-->
<style>
    .gradient {
        background: linear-gradient(90deg, #3C8DAD 0%, #125D98 100%);
    }

    .template-hover:hover {
        background: #FDDB3A;
    }

    .bg-yellow-template {
        background: #FDDB3A;
    }

    .text-yellow-template{
        color: #fddb3a
    }

    .text-gray-template{
        color: #DDDDDD;
    }

</style>

<style>
    /* since nested groupes are not supported we have to use 
       regular css for the nested dropdowns 
    */
    li>ul {
        transform: translatex(100%) scale(0)
    }

    li:hover>ul {
        transform: translatex(101%) scale(1)
    }

    li>button svg {
        transform: rotate(-90deg)
    }

    li:hover>button svg {
        transform: rotate(-270deg)
    }

    /* Below styles fake what can be achieved with the tailwind config
       you need to add the group-hover variant to scale and define your custom
       min width style.
         See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
         for implementation with config file
    */
    .group:hover .group-hover\:scale-100 {
        transform: scale(1)
    }

    .group:hover .group-hover\:-rotate-180 {
        transform: rotate(180deg)
    }

    .scale-0 {
        transform: scale(0)
    }

    .min-w-32 {
        min-width: 8rem
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        display: none;
    }

</style>
@livewireStyles
