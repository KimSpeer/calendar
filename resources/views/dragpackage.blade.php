<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  @livewireStyles
</head>
<body class="h-full">
           @livewire('kim:sort')
    @livewireScripts


    <script>
        let root = document.querySelector('[drag-root]')

        root.querySelectorAll('[drag-item]').forEach(el => {
            el.addEventListener('dragstart', e => {
                e.target.setAttribute('dragging', true)
                console.log('start')
            })

            el.addEventListener('drop', e => {
                e.target.classList.remove("bg-yellow-100")

                let draggingEl = root.querySelector('[dragging]')

                e.target.before(draggingEl);

                //Refresh the livewire component

                let orderIds = Array.from(root.querySelectorAll('[drag-item]'))
                    .map(itemEl => itemEl.getAttribute('drag-item'))

                let method  = root.getAttribute('drag-root')

                component.call(method, orderIds)
            })

            el.addEventListener('dragenter', e => {
                e.target.classList.add("bg-yellow-100")
                e.preventDefault()
            })

            el.addEventListener('dragover', e => {
                e.preventDefault()
            })

            el.addEventListener('dragleave', e => {

                e.target.classList.remove("bg-yellow-100")
                console.log('leave')
            })

            el.addEventListener('dragend', e => {
                console.log('end')
                e.target.removeAttribute('dragging')

            })
        })
    </script>
</body>
</html>
