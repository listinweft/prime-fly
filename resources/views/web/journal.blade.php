

@extends('web.layouts.main')
@section('content')
<main class="single-blog">
            <section class="single-blog-content">
                <div class="container">
                    <div class="blog-main">
                        <div class="blog-share-left position-sticky">
                            <p>966 <span>Shares</span> </p>
                            <ul>
                                <li><a href="#0"><img src="{{ asset('frontend/images/icon/facebook.png')}}" alt=""></a></li>
                                <li><a href="#0"><img src="{{ asset('frontend/images/icon/twitter.png')}}" alt=""></a></li>
                                <li><a href="#0"><img src="{{ asset('frontend/images/icon/whatsapp.png')}}" alt=""></a></li>
                                <li><a href="#0"><img src="{{ asset('frontend/images/icon/linkedIn.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="blog-content-area">
                            <h1 class="single-blog-title">{{ $blog->title }}</h1>
                            <p class="blog-overview">Sam Smith  |   March 2022   |   Study Power CEO</p>
                            <div class="featured-image"> {!! Helper::printImage($blog, 'image','image_webp','image_attribute', 'img-fluid') !!}</div>
                            <div class="the-content">
                                <h2>{!! $blog->description !!}</h2>
                                
                                
                                
                            </div>
                            <div class="reaction-stati">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="reaction-stati-box">
                                            <div class="reaction-stati-image-wraper">
                                                <div class="reaction-stati-image"><img src="{{ asset('frontend/images/blog/avatar-1.png')}}" alt=""></div>
                                                <div class="reaction-stati-image"><img src="{{ asset('frontend/images/blog/avatar-2.png')}}" alt=""></div>
                                                <div class="reaction-stati-image"><img src="{{ asset('frontend/images/blog/avatar-3.png')}}" alt=""></div>
                                            </div>
                                            <div class="reaction-stati-count">233 Likes</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="like-share-wraper">
                                            <div class="like-share-item">
                                                <div class="like-btn">
                                                    <svg width="34" height="30" viewBox="0 0 34 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.9998 29.0704C16.4568 29.0704 15.9141 28.864 15.5007 28.451L2.76233 15.73C-0.825751 12.1465 -0.932457 6.33453 2.52489 2.77436C4.26258 0.985442 6.59492 0 9.09263 0C11.5377 0 13.8347 0.949403 15.5604 2.67296L16.9991 4.10996L18.4344 2.67331C20.1607 0.949403 22.4578 0 24.9025 0C27.4023 0 29.7357 0.984736 31.473 2.77295C34.9321 6.33277 34.8268 12.1454 31.2377 15.7296L18.499 28.451C18.0856 28.8637 17.5429 29.0704 16.9998 29.0704ZM9.09263 1.44725C6.9896 1.44725 5.02578 2.27652 3.56298 3.78277C0.654003 6.77832 0.753643 11.6787 3.78488 14.706L16.5232 27.427C16.7864 27.6896 17.214 27.6888 17.4765 27.427L30.2152 14.7057C33.2471 11.6776 33.3457 6.7769 30.4349 3.78136C28.9725 2.27616 27.0076 1.44725 24.9025 1.44725C22.8439 1.44725 20.9102 2.24613 19.4576 3.69691L17.5118 5.64448C17.2292 5.92785 16.7712 5.92714 16.4886 5.64518L14.5378 3.69691C13.0853 2.24613 11.1515 1.44725 9.09263 1.44725Z" fill="black"/>
                                                    </svg>                                                    
                                                </div>
                                                Like
                                            </div>
                                            <div class="like-share-item">
                                                <div class="like-btn">
                                                    <svg width="39" height="34" viewBox="0 0 39 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M38.2234 12.5084L24.3737 0.190831C24.265 0.0941065 24.1307 0.0308773 23.9869 0.00876393C23.8431 -0.0133494 23.696 0.00659694 23.5633 0.066199C23.4306 0.125801 23.3179 0.222515 23.2389 0.344683C23.1599 0.466852 23.1179 0.609261 23.118 0.754746V5.40922C19.7072 5.28153 16.3126 5.93906 13.1962 7.33106C10.0797 8.72307 7.32465 10.8124 5.14352 13.4378C2.9624 16.0632 1.4135 19.1545 0.61632 22.4733C-0.180863 25.7921 -0.205025 29.2497 0.545696 32.5794C0.579994 32.7312 0.660433 32.8688 0.775984 32.9732C0.891535 33.0775 1.03654 33.1436 1.19112 33.1623C1.22131 33.1661 1.25171 33.168 1.28214 33.1681C1.42227 33.1679 1.55959 33.1288 1.67875 33.0551C1.79792 32.9814 1.89424 32.876 1.95693 32.7506C5.85635 24.9402 13.3552 20.7938 23.118 21.0317V25.3891C23.1179 25.5346 23.1599 25.677 23.2389 25.7992C23.3179 25.9214 23.4306 26.0181 23.5633 26.0777C23.696 26.1373 23.8431 26.1572 23.9869 26.1351C24.1307 26.113 24.265 26.0498 24.3737 25.953L38.2234 13.6359C38.303 13.5651 38.3667 13.4783 38.4103 13.3811C38.4539 13.284 38.4765 13.1787 38.4765 13.0721C38.4765 12.9656 38.4539 12.8603 38.4103 12.7632C38.3667 12.666 38.303 12.5792 38.2234 12.5084ZM24.6269 23.7086V20.3031C24.6269 20.1089 24.552 19.9222 24.4179 19.7818C24.2837 19.6414 24.1006 19.5581 23.9066 19.5493C18.8037 19.3168 14.2365 20.1976 10.3309 22.1666C6.7434 23.9669 3.73762 26.7442 1.65987 30.1785C1.30672 27.263 1.57562 24.3058 2.44886 21.5019C3.3221 18.698 4.77983 16.111 6.72593 13.9116C8.67202 11.7122 11.0623 9.95038 13.739 8.74227C16.4158 7.53415 19.3182 6.90721 22.255 6.90279C22.773 6.90279 23.2947 6.92224 23.8168 6.96071C23.9203 6.9684 24.0243 6.95464 24.1223 6.9203C24.2202 6.88596 24.31 6.83177 24.386 6.76113C24.4621 6.69049 24.5227 6.60491 24.5642 6.50976C24.6056 6.41461 24.627 6.31193 24.6269 6.20814V2.43449L36.5866 13.0719L24.6269 23.7086Z" fill="black"/>
                                                    </svg>                                                                                                        
                                                </div>
                                                Share
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-wraper">
                                <div class="comment-form">
                                    <form action="#0" method="post">
                                        <div class="form-grid">
                                            <input type="text" placeholder="Write a Comment.....">
                                            <div class="comment-avatar"><img src="{{ asset('frontend/images/blog/avatar-3.png')}}" alt=""></div>
                                        </div>
                                        <div class="comment-sending">
                                            <div class="comment-sending-field">
                                                <input type="submit" value="">
                                            </div>
                                            <div class="comment-send-icon">
                                                <svg width="36" height="27" viewBox="0 0 36 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.95784 11.4649C1.98149 11.6931 2.18159 11.8975 2.40641 11.9215L15.1245 13.2815C16.2544 13.4024 16.2556 13.5981 15.1245 13.7191L2.40641 15.0791C2.18232 15.103 1.98109 15.3113 1.95784 15.5357L0.916158 25.5887C0.892512 25.8169 1.04991 25.9347 1.25324 25.8572L33.3102 13.645C33.52 13.5651 33.5136 13.433 33.3102 13.3556L1.25324 1.14339C1.04343 1.06347 0.892909 1.18751 0.916158 1.41188L1.95784 11.4649ZM2.06993 12.7104C1.61893 12.6621 1.21487 12.2519 1.16893 11.8085L0.00466939 0.572505C-0.0419434 0.122654 0.265735 -0.110418 0.690407 0.0513618L35.2237 13.2069C35.6491 13.3689 35.6484 13.6319 35.2237 13.7937L0.690407 26.9492C0.265072 27.1113 -0.0412724 26.8715 0.00466939 26.4281L1.16893 15.1921C1.21554 14.7422 1.61642 14.3387 2.06993 14.2902L9.05034 13.5438C9.27503 13.5198 9.27041 13.4803 9.05034 13.4568L2.06993 12.7104Z" fill="#ABABAB"/>
                                                </svg>                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Comment listing -->
                                <div class="comment-listing-wraper">
                                    <h4>Comments</h4>
                                    <div class="comment-listing-item-wraper">
                                        <div class="comment-item">
                                            <div class="user-comment-avatar"><img src="{{ asset('frontend/images/blog/avatar-1.png')}}" alt=""></div>
                                            <div class="user-comment-section">
                                                <div class="user-comment">
                                                    <h5>Sam Morgan</h5>
                                                    <p>Eget quis orci id feugiat. Sed vel non adipiscing scelerisque purus. Morbi fusce odio faucibus enim facilisis vulputate.</p>
                                                    <div class="comment-share-like">
                                                        <div class="comment-share-like-item">
                                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8.49992 14.5352C8.22838 14.5352 7.95703 14.432 7.75033 14.2255L1.38117 7.86499C-0.412875 6.07324 -0.466228 3.16727 1.26245 1.38718C2.13129 0.492721 3.29746 0 4.54631 0C5.76884 0 6.91735 0.474701 7.78018 1.33648L8.49957 2.05498L9.21718 1.33665C10.0804 0.474701 11.2289 0 12.4512 0C13.7011 0 14.8678 0.492368 15.7365 1.38647C17.4661 3.16638 17.4134 6.07271 15.6188 7.86481L9.24951 14.2255C9.04281 14.4318 8.77146 14.5352 8.49992 14.5352ZM4.54631 0.723624C3.4948 0.723624 2.51289 1.13826 1.78149 1.89139C0.327001 3.38916 0.376821 5.83934 1.89244 7.35301L8.2616 13.7135C8.39321 13.8448 8.60698 13.8444 8.73824 13.7135L15.1076 7.35284C16.6235 5.83881 16.6728 3.38845 15.2175 1.89068C14.4862 1.13808 13.5038 0.723624 12.4512 0.723624C11.422 0.723624 10.4551 1.12307 9.72881 1.84846L8.75591 2.82224C8.61458 2.96392 8.38562 2.96357 8.24428 2.82259L7.26891 1.84846C6.54264 1.12307 5.57575 0.723624 4.54631 0.723624Z" fill="black"/>
                                                            </svg>                                                            
                                                        </div>
                                                        <div class="comment-share-like-item reply-btn">
                                                            <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.23536 3.70609H10.6361L7.66016 0.730194C7.49483 0.564867 7.49483 0.289323 7.66016 0.123995C7.82549 -0.0413318 8.10103 -0.0413318 8.26636 0.123995L11.9036 3.8163C11.9587 3.87141 11.9587 3.87141 11.9587 3.92652C12.0138 4.03674 12.0138 4.14696 11.9587 4.25718C11.9587 4.31229 11.9036 4.31229 11.9036 4.36739L8.21125 8.0597C8.15614 8.11481 8.04592 8.16992 7.93571 8.16992C7.82549 8.16992 7.71527 8.11481 7.66016 8.0597C7.49483 7.89437 7.49483 7.61883 7.66016 7.4535L10.6361 4.47761H5.23536C2.81056 4.47761 0.826635 6.46154 0.826635 8.88634C0.826635 9.98852 1.26751 11.0907 1.98393 11.9173C2.81056 12.7991 4.02296 13.3502 5.23536 13.3502C5.4558 13.3502 5.67623 13.5155 5.67623 13.791C5.67623 14.0666 5.51091 14.2319 5.23536 14.2319C3.80253 14.2319 2.36969 13.6257 1.37773 12.5786C0.495981 11.5867 0 10.3192 0 8.99656C0 6.07578 2.31458 3.70609 5.23536 3.70609Z" fill="black"/>
                                                            </svg>                                                                                                                       
                                                        </div>
                                                    </div>
                                                    <!-- if comment has reply -->
                                                    <div class="comment-reply">
                                                        <div class="comment-reply-author">
                                                            <div class="comment-avatar"><img src="{{ asset('frontend/images/blog/avatar-3.png')}}" alt=""></div>
                                                            <div class="reply-comment-container">
                                                                <div class="comment-author">Sonia Guptha</div>
                                                                <div class="reply">
                                                                    <!-- <p>Eget quis orci id feugiat. Sed vel non adipiscing scelerisque purus. Morbi fusce odio faucibus enim facilisis vulputate. Congue tristique eu risus consequat enim egestas enim nunc.</p> -->
                                                                    <form action="#0">
                                                                        <div class="form-grid mb-0">
                                                                            <textarea name="" id="" placeholder="Type here...."></textarea>
                                                                        </div>
                                                                        <div class="post-comment">
                                                                            <div class="post-comment-btn">
                                                                                <input type="submit" value="">
                                                                            </div>
                                                                            <div class="post-comment-btn-icon"><i class="bi bi-send"></i></div>
                                                                            </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <!--// if comment has reply -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-item">
                                            <div class="user-comment-avatar"><img src="{{ asset('frontend/images/blog/avatar-2.png')}}" alt=""></div>
                                            <div class="user-comment-section">
                                                <div class="user-comment">
                                                    <h5>Sam Morgan</h5>
                                                    <p>Eget quis orci id feugiat. Sed vel non adipiscing scelerisque purus. Morbi fusce odio faucibus enim facilisis vulputate.</p>
                                                    <div class="comment-share-like">
                                                        <div class="comment-share-like-item">
                                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8.49992 14.5352C8.22838 14.5352 7.95703 14.432 7.75033 14.2255L1.38117 7.86499C-0.412875 6.07324 -0.466228 3.16727 1.26245 1.38718C2.13129 0.492721 3.29746 0 4.54631 0C5.76884 0 6.91735 0.474701 7.78018 1.33648L8.49957 2.05498L9.21718 1.33665C10.0804 0.474701 11.2289 0 12.4512 0C13.7011 0 14.8678 0.492368 15.7365 1.38647C17.4661 3.16638 17.4134 6.07271 15.6188 7.86481L9.24951 14.2255C9.04281 14.4318 8.77146 14.5352 8.49992 14.5352ZM4.54631 0.723624C3.4948 0.723624 2.51289 1.13826 1.78149 1.89139C0.327001 3.38916 0.376821 5.83934 1.89244 7.35301L8.2616 13.7135C8.39321 13.8448 8.60698 13.8444 8.73824 13.7135L15.1076 7.35284C16.6235 5.83881 16.6728 3.38845 15.2175 1.89068C14.4862 1.13808 13.5038 0.723624 12.4512 0.723624C11.422 0.723624 10.4551 1.12307 9.72881 1.84846L8.75591 2.82224C8.61458 2.96392 8.38562 2.96357 8.24428 2.82259L7.26891 1.84846C6.54264 1.12307 5.57575 0.723624 4.54631 0.723624Z" fill="black"/>
                                                            </svg>                                                            
                                                        </div>
                                                        <div class="comment-share-like-item">
                                                            <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.23536 3.70609H10.6361L7.66016 0.730194C7.49483 0.564867 7.49483 0.289323 7.66016 0.123995C7.82549 -0.0413318 8.10103 -0.0413318 8.26636 0.123995L11.9036 3.8163C11.9587 3.87141 11.9587 3.87141 11.9587 3.92652C12.0138 4.03674 12.0138 4.14696 11.9587 4.25718C11.9587 4.31229 11.9036 4.31229 11.9036 4.36739L8.21125 8.0597C8.15614 8.11481 8.04592 8.16992 7.93571 8.16992C7.82549 8.16992 7.71527 8.11481 7.66016 8.0597C7.49483 7.89437 7.49483 7.61883 7.66016 7.4535L10.6361 4.47761H5.23536C2.81056 4.47761 0.826635 6.46154 0.826635 8.88634C0.826635 9.98852 1.26751 11.0907 1.98393 11.9173C2.81056 12.7991 4.02296 13.3502 5.23536 13.3502C5.4558 13.3502 5.67623 13.5155 5.67623 13.791C5.67623 14.0666 5.51091 14.2319 5.23536 14.2319C3.80253 14.2319 2.36969 13.6257 1.37773 12.5786C0.495981 11.5867 0 10.3192 0 8.99656C0 6.07578 2.31458 3.70609 5.23536 3.70609Z" fill="black"/>
                                                            </svg>                                                                                                                       
                                                        </div>
                                                    </div>
                                                    <!-- if comment has reply -->
                                                    <div class="comment-reply">
                                                        <div class="comment-reply-author">
                                                            <div class="comment-avatar"><img src="{{ asset('frontend/images/blog/avatar-3.png')}}" alt=""></div>
                                                            <div class="reply-comment-container">
                                                                <div class="comment-author">Sonia Guptha</div>
                                                                <div class="reply">
                                                                    <p>Eget quis orci id feugiat. Sed vel non adipiscing scelerisque purus. Morbi fusce odio faucibus enim facilisis vulputate. Congue tristique eu risus consequat enim egestas enim nunc.</p>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <!--// if comment has reply -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-item">
                                            <div class="user-comment-avatar"><img src="{{ asset('frontend/images/blog/avatar-3.png')}}" alt=""></div>
                                            <div class="user-comment-section">
                                                <div class="user-comment">
                                                    <h5>Sam Morgan</h5>
                                                    <p>Eget quis orci id feugiat. Sed vel non adipiscing scelerisque purus. Morbi fusce odio faucibus enim facilisis vulputate.</p>
                                                    <div class="comment-share-like">
                                                        <div class="comment-share-like-item">
                                                            <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8.49992 14.5352C8.22838 14.5352 7.95703 14.432 7.75033 14.2255L1.38117 7.86499C-0.412875 6.07324 -0.466228 3.16727 1.26245 1.38718C2.13129 0.492721 3.29746 0 4.54631 0C5.76884 0 6.91735 0.474701 7.78018 1.33648L8.49957 2.05498L9.21718 1.33665C10.0804 0.474701 11.2289 0 12.4512 0C13.7011 0 14.8678 0.492368 15.7365 1.38647C17.4661 3.16638 17.4134 6.07271 15.6188 7.86481L9.24951 14.2255C9.04281 14.4318 8.77146 14.5352 8.49992 14.5352ZM4.54631 0.723624C3.4948 0.723624 2.51289 1.13826 1.78149 1.89139C0.327001 3.38916 0.376821 5.83934 1.89244 7.35301L8.2616 13.7135C8.39321 13.8448 8.60698 13.8444 8.73824 13.7135L15.1076 7.35284C16.6235 5.83881 16.6728 3.38845 15.2175 1.89068C14.4862 1.13808 13.5038 0.723624 12.4512 0.723624C11.422 0.723624 10.4551 1.12307 9.72881 1.84846L8.75591 2.82224C8.61458 2.96392 8.38562 2.96357 8.24428 2.82259L7.26891 1.84846C6.54264 1.12307 5.57575 0.723624 4.54631 0.723624Z" fill="black"/>
                                                            </svg>                                                            
                                                        </div>
                                                        <div class="comment-share-like-item">
                                                            <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.23536 3.70609H10.6361L7.66016 0.730194C7.49483 0.564867 7.49483 0.289323 7.66016 0.123995C7.82549 -0.0413318 8.10103 -0.0413318 8.26636 0.123995L11.9036 3.8163C11.9587 3.87141 11.9587 3.87141 11.9587 3.92652C12.0138 4.03674 12.0138 4.14696 11.9587 4.25718C11.9587 4.31229 11.9036 4.31229 11.9036 4.36739L8.21125 8.0597C8.15614 8.11481 8.04592 8.16992 7.93571 8.16992C7.82549 8.16992 7.71527 8.11481 7.66016 8.0597C7.49483 7.89437 7.49483 7.61883 7.66016 7.4535L10.6361 4.47761H5.23536C2.81056 4.47761 0.826635 6.46154 0.826635 8.88634C0.826635 9.98852 1.26751 11.0907 1.98393 11.9173C2.81056 12.7991 4.02296 13.3502 5.23536 13.3502C5.4558 13.3502 5.67623 13.5155 5.67623 13.791C5.67623 14.0666 5.51091 14.2319 5.23536 14.2319C3.80253 14.2319 2.36969 13.6257 1.37773 12.5786C0.495981 11.5867 0 10.3192 0 8.99656C0 6.07578 2.31458 3.70609 5.23536 3.70609Z" fill="black"/>
                                                            </svg>                                                                                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- // Comment listing -->

                                <!-- Journal author -->
                                <div class="journal-author">
                                    <div class="journal-author-item">
                                        <div class="journal-author-image"><img src="{{ asset('frontend/images/journal-author.jpg')}}" alt=""></div>
                                        <div class="journal-author-content">
                                            <h5>Sam Smith- Author <span>Power House CEO</span></h5>
                                            <p>Et egestas posuere pellentesque cras nunc et. Purus ac faucibus quisque aenean. Dolor magna consequat aliquam diam facilisi nibh pretium sollicitudin pretium. Et egestas posuere pellentesque cras nunc et. Purus ac faucibus quisque aenean. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- //Journal author -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        
    @endsection
    
    @push('scripts')

@endpush
<!--Blog Listing Page End -->





