<x-header />

<h1 class="text-center text-3xl font-bold">Blog Actu Techo</h1>
<p class="text-center my-5 mx-auto w-1/2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quo,
    asperiores
    voluptatem
    temporibus expedita
    reiciendis nisi dolorem quam corporis quos quia ad! Asperiores repellat voluptatum consequuntur iusto
    perspiciatis
    explicabo, temporibus maxime, neque dolor corporis omnis aspernatur ipsam minima ullam eos.</p>

<div class="categories flex flex-col justify-center gap-2">
    {{-- <a href="{{ '/' }}">Tous</a> --}}
    @csrf
    <label for="all">Tous</label>
    <input type="checkbox" name="categories[]" value="all" id="all" class='checkCategories'>
    @foreach ($categories as $categorie)
        {{-- <a href="{{ '/?categories=' . $categorie->id }}">{{ $categorie->title }}</a> --}}
        <label for="{{ $categorie->title }}">{{ $categorie->title }}</label>
        <input type="checkbox" name="categories[]" value="{{ $categorie->id }}" id="{{ $categorie->title }}"
            class='checkCategories'>
    @endforeach
</div>
<div class="post-container flex flex-wrap gap-6 justify-center">


</div>



<script>
    const postContainer = document.querySelector('.post-container');
    const checkboxes = document.querySelectorAll('input[type=checkbox]');
    const labels = document.querySelectorAll('labels');

    const loadPosts = (url) => {
        fetch(url)
            .then(response => response.text())
            .then(data => postContainer.innerHTML = data)
            .catch(error => console.error('Erreur lors du chargement des posts:', error));
    };

    loadPosts('http://localhost:8000/filter');

    checkboxes.forEach(check => {
        check.addEventListener('change', () => {
            if (check.checked) {
                const selectedCategories = Array.from(document.querySelectorAll(
                        'input[type=checkbox]:checked'))
                    .map(checkbox => checkbox.value)
                    .join(',');

                const url = 'http://localhost:8000/filter?categories=' + selectedCategories;
                loadPosts(url);
                const label = document.querySelector('label[for="' + check.id + '"]');
                if (label) {
                    label.style.color = 'black';
                }
            } else {
                const selectedCategories = Array.from(document.querySelectorAll(
                        'input[type=checkbox]:checked'))
                    .map(checkbox => checkbox.value)
                    .join(',');

                console.log(selectedCategories);

                const url = 'http://localhost:8000/filter?categories=' + selectedCategories;
                loadPosts(url);
                const label = document.querySelector('label[for="' + check.id + '"]');
                if (label) {
                    label.style.color = '#7C7D7D';
                }
            }
        });
    });

    postContainer.addEventListener('click', event => {
        if (event.target.tagName === 'A') {
            event.preventDefault();
            const url = event.target.href;
            console.log(url);
            loadPosts(url);
        }
    });
</script>

<x-footer />
