@extends('themes.website.layouts.home')
@section('content')

<!-- img modal -->
<div id="img-modal-box">
    <div id="img-modal">
        <button type="button" id="modal-close-btn" class="flex">
            <i class="fas fa-times"></i>
        </button>
        <button type="button" id="prev-btn" class="flex">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button type="button" id="next-btn" class="flex">
            <i class="fas fa-chevron-right"></i>
        </button>
        <img src="{{ asset('themes/images/gallery-1.jpg') }}">
    </div>
</div>
<!-- end of img modal -->
<!-- blog section -->
<section id="blog" class="py-4">
    <div class="container">
        <div class="title-wrap">
            <h2 class="sm-title">know the places in Sri Lanka</h2>
            <h3 class="lg-title">Tours in sri lanka</h3>
        </div>

        <div class="blog-row">
            <div class="blog-item my-2 shadow">
                <div class="blog-item-top">
                    <img src="{{ asset('themes/images/srilanka/sigiriya.jpg') }}" alt="blog">
                    <span class="blog-date">05 Days</span>
                </div>
                <div class="blog-item-bottom">
                    <span>Sigiriya | minneriya</span>
                    <a href="tour.html">Tour of Sigiriya and Minneriya</a>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                </div>
            </div>

            <div class="blog-item my-2 shadow">
                <div class="blog-item-top">
                    <img src="{{ asset('themes/images/srilanka/sigiriya.jpg') }}" alt="blog">
                    <span class="blog-date">07 Days</span>
                </div>
                <div class="blog-item-bottom">
                    <span>Sigiriya | Dhambulla</span>
                    <a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit?</a>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                </div>
            </div>

            <div class="blog-item my-2 shadow">
                <div class="blog-item-top">
                    <img src="{{ asset('themes/images/srilanka/kandy.jpg') }}" alt="blog">
                    <span class="blog-date">07 Days</span>
                </div>
                <div class="blog-item-bottom">
                    <span>Kandy</span>
                    <a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit?</a>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                </div>
            </div>

            <div class="blog-item my-2 shadow">
                <div class="blog-item-top">
                    <img src="{{ asset('themes/images/srilanka/hikkaduwa.jpg') }}" alt="blog">
                    <span class="blog-date">04 Days</span>
                </div>
                <div class="blog-item-bottom">
                    <span>Hikkaduwa</span>
                    <a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit?</a>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                </div>
            </div>

            <div class="blog-item my-2 shadow">
                <div class="blog-item-top">
                    <img src="{{ asset('themes/images/srilanka/galle.jpg') }}" alt="blog">
                    <span class="blog-date">05 Days</span>
                </div>
                <div class="blog-item-bottom">
                    <span>Galle</span>
                    <a href="#">Lorem, ipsum dolor sit amet consectetur adipisicing elit?</a>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio voluptatem nulla harum accusantium tempora dicta quas quod id, repellat temporibus illo libero explicabo laboriosam.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of blog section -->
@push('js')
<script>
    // image modal
    const allGalleryItem = document.querySelectorAll('.gallery-item');
    const imgModalDiv = document.getElementById('img-modal-box');
    const modalCloseBtn = document.getElementById('modal-close-btn');
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    let imgIndex = 0;

    allGalleryItem.forEach((galleryItem) => {
        galleryItem.addEventListener('click', () => {
            imgModalDiv.style.display = "block";
            let imgSrc = galleryItem.querySelector('img').src;
            imgIndex = parseInt(imgSrc.split("-")[1].substring(0, 1));
            showImageContent(imgIndex);
        })
    });

    // next click
    nextBtn.addEventListener('click', () => {
        imgIndex++;
        if (imgIndex > allGalleryItem.length) {
            imgIndex = 1;
        }
        showImageContent(imgIndex);
    });

    // previous click
    prevBtn.addEventListener('click', () => {
        imgIndex--;
        if (imgIndex <= 0) {
            imgIndex = allGalleryItem.length;
        }
        showImageContent(imgIndex);
    });

    function showImageContent(index) {
        imgModalDiv.querySelector('#img-modal img').src = `images/gallery-${index}.jpg`;
    }

    modalCloseBtn.addEventListener('click', () => {
        imgModalDiv.style.display = "none";
    })
</script>
@endpush

@stop