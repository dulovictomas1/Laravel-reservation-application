@include('layouts.header')

<header class="bg-white shadow" style="background-color: rgb(48, 48, 48); color: white;">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="heading-h2">Domov</h2>        
    </div>
</header>

        <main>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <p>{{ $home->text }}</p>
        </div>


        </main>
        
    </body>
</html>
