
  <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="footer-logo-wraper">
                                <a href="{{ url('/') }}"><img src=" {{ asset('frontend/images/logo.png') }}" alt=""></a>
                               
                                <a href="{{ url('/journals') }}"><img src="{{ asset('frontend/images/logo-journal.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="footer-link-wraper">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        @if(Auth::guard('customer')->check())
                                        <li><a href="{{ url('journals') }}">Journals</a></li>
                                        @endif
                                        @if(Auth::guard('customer')->check())
                                        <li><a href="{{ url('events') }}">Events</a></li>
                                        @endif
                                        <li><a href="{{ url('blogs') }}">Blogs</a></li>
                                       
                                    </ul>
                                </div>
                                <div class="news-letter-wraper">
                                    <p class="news-letter-head">SUBSCRIBE TO OUR EXCLUSIVE NEWSLETTER</p>
                                    <div class="news-letter-form-box">
                                        <form action="#0" id="newsletterForm">
                                            <div class="news-letter-form">
                                                <input type="email" name="email" id="email" placeholder="Your Email" class="required">
                                                <div class="news-letter-form-submit">
                                                    <div class="news-letter-form-field">
                                                        <input type="submit" value="" class="form_submit_btn" data-url="/newsletter">
                                                    </div>
                                                    
                                                    <div class="form-submit-text">
                                                       Subscribe 
                                                            <span><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.9957 0.906927C10.9445 0.357021 10.4572 -0.0472596 9.90729 0.00394142L0.946051 0.838311C0.396144 0.889512 -0.00813605 1.37681 0.043065 1.92671C0.094266 2.47662 0.58156 2.8809 1.13147 2.8297L9.09701 2.08804L9.83867 10.0536C9.88988 10.6035 10.3772 11.0078 10.9271 10.9566C11.477 10.9054 11.8813 10.4181 11.8301 9.86817L10.9957 0.906927ZM1.76962 12.4862L10.7696 1.63814L9.23038 0.361127L0.230384 11.2091L1.76962 12.4862Z" fill="#FF000A"/>
                                                            </svg> 
                                                            </span>
                                                         
                                                    </div>
                                                </div> 
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="validation-msg">Please enter valid email</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="credentials">
                        <div class="credentials-container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="credential-links">
                                        <ul>
                                            <li>
                                                <a href="tel:+00971505218456">
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.08443 4.76996L7.84597 6.13453C8.53323 7.36598 8.25734 8.98143 7.17492 10.0639C7.17492 10.0639 7.17492 10.0639 7.17492 10.0639C7.1748 10.064 5.86209 11.3769 8.24247 13.7573C10.6222 16.137 11.9351 14.8257 11.9359 14.8249C11.936 14.8248 11.9359 14.8248 11.936 14.8248C13.0184 13.7424 14.6338 13.4666 15.8653 14.1538L17.2298 14.9153C19.0893 15.9531 19.3089 18.5609 17.6745 20.1953C16.6923 21.1775 15.4892 21.9417 14.1592 21.9921C11.9202 22.077 8.11782 21.5103 4.30364 17.6961C0.489452 13.882 -0.0771917 10.0796 0.00768762 7.84062C0.0581084 6.5106 0.822313 5.30745 1.80444 4.32532C3.43891 2.69085 6.04667 2.91046 7.08443 4.76996Z" fill="#6C6C6C"/>
                                                        <path d="M10.8646 0.739036C10.9423 0.25925 11.3959 -0.0662177 11.8757 0.0114575C11.9054 0.0171423 12.0009 0.0350017 12.051 0.046152C12.1511 0.0684501 12.2908 0.102781 12.4649 0.153502C12.8132 0.254933 13.2996 0.422028 13.8835 0.689721C15.0526 1.22567 16.6083 2.16321 18.2226 3.77756C19.8369 5.3919 20.7745 6.9476 21.3104 8.11662C21.5781 8.70051 21.7452 9.187 21.8467 9.53524C21.8974 9.70938 21.9317 9.84904 21.954 9.94917C21.9652 9.99923 21.9733 10.0394 21.979 10.0691L21.9857 10.1057C22.0634 10.5855 21.7409 11.0578 21.2611 11.1355C20.7827 11.213 20.332 10.8891 20.2524 10.4115C20.25 10.3987 20.2432 10.3643 20.236 10.3318C20.2215 10.2668 20.1965 10.1637 20.1568 10.0274C20.0774 9.75482 19.9395 9.34961 19.7105 8.85013C19.2531 7.85239 18.4305 6.47462 16.978 5.02212C15.5255 3.56963 14.1478 2.74709 13.15 2.28967C12.6505 2.06068 12.2453 1.92277 11.9727 1.84336C11.8364 1.80366 11.6651 1.76434 11.6001 1.74987C11.1226 1.67029 10.7872 1.21745 10.8646 0.739036Z" fill="#636363"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1301 4.78659C11.2636 4.31926 11.7507 4.04866 12.2181 4.18218L11.9763 5.02836C12.2181 4.18218 12.2181 4.18218 12.2181 4.18218L12.2198 4.18266L12.2216 4.18318L12.2255 4.18433L12.2346 4.18704L12.2578 4.19427C12.2755 4.19993 12.2976 4.2073 12.3239 4.21665C12.3766 4.23535 12.4463 4.26194 12.5317 4.29856C12.7026 4.37182 12.9362 4.48496 13.2231 4.65476C13.7975 4.99467 14.5815 5.55928 15.5026 6.48035C16.4236 7.40143 16.9883 8.18547 17.3282 8.7598C17.498 9.04671 17.6111 9.28029 17.6844 9.45123C17.721 9.53666 17.7476 9.60631 17.7663 9.65901C17.7756 9.68535 17.783 9.70745 17.7887 9.72514L17.7959 9.74836L17.7986 9.75745L17.7997 9.76137V9.76137C17.8001 9.76256 17.7997 9.76337 17.7985 9.76374C17.7865 9.76752 17.6926 9.79576 16.9546 10.0066V10.0066C17.4219 9.8731 17.936 10.2229 17.6153 10.5881C17.5077 10.7106 17.3648 10.8047 17.1963 10.8528C16.733 10.9852 16.2502 10.7203 16.1119 10.2602L16.1075 10.2476C16.1013 10.23 16.0883 10.1953 16.0666 10.1446C16.0232 10.0433 15.9445 9.87754 15.8135 9.65625C15.5519 9.21418 15.0793 8.54623 14.258 7.72492C13.4367 6.9036 12.7687 6.43107 12.3267 6.16944C12.1054 6.03847 11.9397 5.95974 11.8384 5.91633C11.7877 5.8946 11.753 5.88165 11.7353 5.8754L11.7227 5.87106C11.2626 5.73274 10.9977 5.24996 11.1301 4.78659Z" fill="#636363"/>
                                                    </svg> 
                                                    00971505218456                                                       
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:admin@esoan.org">
                                                    <svg width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.04134 0H26.9951C27.8292 0 28.5897 0.342115 29.1425 0.89491C29.6944 1.4477 30.0355 2.20731 30.0355 3.04134V16.4138C30.0355 17.2507 29.6934 18.0113 29.1425 18.5621L29.1135 18.5892C28.5637 19.1246 27.8156 19.4551 26.9942 19.4551H3.04037C2.20538 19.4551 1.44481 19.113 0.893943 18.5612C0.342114 18.0113 0 17.2507 0 16.4138V3.04134C0 2.20731 0.342114 1.44674 0.894909 0.893943C1.4477 0.342114 2.20731 0.000966631 3.04134 0.000966631V0ZM3.65502 2.57262L3.13798 3.38732L15.0182 10.9438L26.8975 3.38732L26.3805 2.57262L15.0173 9.79955L3.65405 2.57262H3.65502Z" fill="#6C6C6C"/>
                                                    </svg>   
                                                    admin@esoan.org                                                     
                                                </a>
                                            </li>
                                            <li>
                                                <a href="mailto:ejoan@esoan.org">
                                                    <svg width="31" height="20" viewBox="0 0 31 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.04134 0H26.9951C27.8292 0 28.5897 0.342115 29.1425 0.89491C29.6944 1.4477 30.0355 2.20731 30.0355 3.04134V16.4138C30.0355 17.2507 29.6934 18.0113 29.1425 18.5621L29.1135 18.5892C28.5637 19.1246 27.8156 19.4551 26.9942 19.4551H3.04037C2.20538 19.4551 1.44481 19.113 0.893943 18.5612C0.342114 18.0113 0 17.2507 0 16.4138V3.04134C0 2.20731 0.342114 1.44674 0.894909 0.893943C1.4477 0.342114 2.20731 0.000966631 3.04134 0.000966631V0ZM3.65502 2.57262L3.13798 3.38732L15.0182 10.9438L26.8975 3.38732L26.3805 2.57262L15.0173 9.79955L3.65405 2.57262H3.65502Z" fill="#6C6C6C"/>
                                                    </svg>   
                                                    ejoan@esoan.org                                                     
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="social-icons">
                                        <li><a href="https://www.facebook.com/profile.php?id=100095300920775&mibextid=ZbWKwL">
                                            <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.75 13.1875H11.5625L12.6875 8.6875H8.75V6.4375C8.75 5.27875 8.75 4.1875 11 4.1875H12.6875V0.4075C12.3207 0.359125 10.9359 0.25 9.47337 0.25C6.419 0.25 4.25 2.11413 4.25 5.5375V8.6875H0.875V13.1875H4.25V22.75H8.75V13.1875Z" fill="#8D8D8D"/>
                                            </svg>                                                
                                        </a></li>
                                        <li><a href="https://twitter.com/ESoAN_ORG">
                                            <svg width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23.6809 2.3628C22.822 2.7427 21.9112 2.9922 20.9786 3.10305C21.9616 2.51516 22.6973 1.58994 23.0486 0.499795C22.1261 1.0488 21.1148 1.43355 20.0606 1.64167C19.3526 0.884072 18.414 0.381629 17.3909 0.212453C16.3679 0.0432775 15.3176 0.216848 14.4033 0.70618C13.489 1.19551 12.7621 1.97319 12.3354 2.91831C11.9087 3.86343 11.8062 4.92305 12.0439 5.93242C10.1731 5.83866 8.343 5.35251 6.67232 4.50554C5.00165 3.65858 3.52777 2.46972 2.34637 1.01617C1.9282 1.73443 1.70845 2.55093 1.70962 3.38205C1.70962 5.0133 2.53988 6.45442 3.80213 7.29817C3.05513 7.27465 2.32459 7.07292 1.67138 6.7098V6.76829C1.6716 7.85471 2.04754 8.90761 2.73545 9.74849C3.42337 10.5894 4.38092 11.1665 5.44575 11.3819C4.75232 11.5698 4.02522 11.5975 3.3195 11.4629C3.61973 12.3981 4.20488 13.2159 4.99304 13.8019C5.7812 14.3879 6.73289 14.7128 7.71487 14.731C6.73892 15.4975 5.62145 16.0642 4.42637 16.3985C3.23128 16.7328 1.98202 16.8283 0.75 16.6795C2.90066 18.0627 5.40423 18.7969 7.96125 18.7945C16.6159 18.7945 21.3488 11.6249 21.3488 5.40705C21.3488 5.20455 21.3431 4.9998 21.3341 4.79955C22.2553 4.13373 23.0504 3.30894 23.682 2.36392L23.6809 2.3628Z" fill="#AFAFAF"/>
                                            </svg>                                                
                                        </a></li>
                                        <li><a href="https://instagram.com/esoan_org?igshid=MzRlODBiNWFlZA==">
                                            <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 8.125C11.1049 8.125 10.2465 8.48058 9.61352 9.11352C8.98058 9.74645 8.625 10.6049 8.625 11.5C8.625 12.3951 8.98058 13.2536 9.61352 13.8865C10.2465 14.5194 11.1049 14.875 12 14.875C12.8951 14.875 13.7536 14.5194 14.3865 13.8865C15.0194 13.2536 15.375 12.3951 15.375 11.5C15.375 10.6049 15.0194 9.74645 14.3865 9.11352C13.7536 8.48058 12.8951 8.125 12 8.125ZM12 5.875C13.4918 5.875 14.9226 6.46763 15.9775 7.52253C17.0324 8.57742 17.625 10.0082 17.625 11.5C17.625 12.9918 17.0324 14.4226 15.9775 15.4775C14.9226 16.5324 13.4918 17.125 12 17.125C10.5082 17.125 9.07742 16.5324 8.02253 15.4775C6.96763 14.4226 6.375 12.9918 6.375 11.5C6.375 10.0082 6.96763 8.57742 8.02253 7.52253C9.07742 6.46763 10.5082 5.875 12 5.875V5.875ZM19.3125 5.59375C19.3125 5.96671 19.1643 6.3244 18.9006 6.58812C18.6369 6.85184 18.2792 7 17.9063 7C17.5333 7 17.1756 6.85184 16.9119 6.58812C16.6482 6.3244 16.5 5.96671 16.5 5.59375C16.5 5.22079 16.6482 4.8631 16.9119 4.59938C17.1756 4.33566 17.5333 4.1875 17.9063 4.1875C18.2792 4.1875 18.6369 4.33566 18.9006 4.59938C19.1643 4.8631 19.3125 5.22079 19.3125 5.59375V5.59375ZM12 2.5C9.21675 2.5 8.76225 2.50788 7.46738 2.56525C6.58538 2.60688 5.99363 2.725 5.44463 2.93875C4.95638 3.12775 4.60425 3.35388 4.22963 3.72963C3.87751 4.06982 3.60677 4.48516 3.43763 4.94463C3.22388 5.49588 3.10575 6.0865 3.06525 6.96738C3.00675 8.20938 3 8.64363 3 11.5C3 14.2833 3.00788 14.7378 3.06525 16.0326C3.10688 16.9135 3.225 17.5064 3.43763 18.0543C3.62888 18.5436 3.85388 18.8958 4.22738 19.2693C4.6065 19.6473 4.95863 19.8734 5.44238 20.0601C5.99813 20.275 6.58988 20.3943 7.46738 20.4348C8.70938 20.4933 9.14363 20.5 12 20.5C14.7833 20.5 15.2378 20.4921 16.5326 20.4348C17.4124 20.3931 18.0053 20.275 18.5543 20.0624C19.0414 19.8723 19.3958 19.6461 19.7693 19.2726C20.1484 18.8935 20.3745 18.5414 20.5613 18.0576C20.775 17.503 20.8943 16.9101 20.9348 16.0326C20.9933 14.7906 21 14.3564 21 11.5C21 8.71675 20.9921 8.26225 20.9348 6.96738C20.8931 6.08763 20.775 5.49363 20.5613 4.94463C20.3917 4.48563 20.1215 4.07046 19.7704 3.72963C19.4303 3.37733 19.015 3.10656 18.5554 2.93763C18.0041 2.72388 17.4124 2.60575 16.5326 2.56525C15.2906 2.50675 14.8564 2.5 12 2.5ZM12 0.25C15.0566 0.25 15.438 0.26125 16.6373 0.3175C17.8354 0.37375 18.651 0.561625 19.3688 0.840625C20.1113 1.12638 20.7368 1.51338 21.3623 2.13775C21.9343 2.70013 22.377 3.38041 22.6594 4.13125C22.9373 4.84788 23.1263 5.66463 23.1825 6.86275C23.2354 8.062 23.25 8.44338 23.25 11.5C23.25 14.5566 23.2388 14.938 23.1825 16.1373C23.1263 17.3354 22.9373 18.151 22.6594 18.8688C22.3778 19.62 21.935 20.3004 21.3623 20.8623C20.7997 21.4341 20.1195 21.8767 19.3688 22.1594C18.6521 22.4373 17.8354 22.6263 16.6373 22.6825C15.438 22.7354 15.0566 22.75 12 22.75C8.94338 22.75 8.562 22.7388 7.36275 22.6825C6.16463 22.6263 5.349 22.4373 4.63125 22.1594C3.88012 21.8775 3.19972 21.4348 2.63775 20.8623C2.06558 20.3 1.62292 19.6197 1.34063 18.8688C1.06163 18.1521 0.87375 17.3354 0.8175 16.1373C0.764625 14.938 0.75 14.5566 0.75 11.5C0.75 8.44338 0.76125 8.062 0.8175 6.86275C0.87375 5.6635 1.06163 4.849 1.34063 4.13125C1.62214 3.37995 2.0649 2.69949 2.63775 2.13775C3.19988 1.56539 3.88023 1.1227 4.63125 0.840625C5.349 0.561625 6.1635 0.37375 7.36275 0.3175C8.562 0.264625 8.94338 0.25 12 0.25Z" fill="#ABABAB"/>
                                            </svg>                                                
                                        </a></li>
                                        <!-- <li><a href="#0">
                                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.05859 2.62515C5.0583 3.22189 4.82096 3.79406 4.39879 4.21581C3.97662 4.63756 3.40421 4.87432 2.80747 4.87402C2.21073 4.87373 1.63855 4.63639 1.21681 4.21422C0.795062 3.79205 0.558296 3.21964 0.558594 2.6229C0.558892 2.02616 0.796231 1.45398 1.2184 1.03224C1.64057 0.610492 2.21298 0.373725 2.80972 0.374024C3.40646 0.374322 3.97863 0.611661 4.40038 1.03383C4.82213 1.456 5.05889 2.02841 5.05859 2.62515V2.62515ZM5.12609 6.54015H0.626094V20.6251H5.12609V6.54015ZM12.2361 6.54015H7.75859V20.6251H12.1911V13.2339C12.1911 9.1164 17.5573 8.7339 17.5573 13.2339V20.6251H22.0011V11.7039C22.0011 4.76265 14.0586 5.0214 12.1911 8.43015L12.2361 6.54015V6.54015Z" fill="#ABAAAA"/>
                                            </svg>                                                
                                        </a></li> -->
                                        <!-- <li><a href="#0">
                                            <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22.2359 3.31025C22.75 5.315 22.75 9.5 22.75 9.5C22.75 9.5 22.75 13.685 22.2359 15.6898C21.9501 16.7979 21.1143 17.6698 20.0556 17.9645C18.133 18.5 11.5 18.5 11.5 18.5C11.5 18.5 4.87038 18.5 2.94438 17.9645C1.88125 17.6653 1.0465 16.7945 0.764125 15.6898C0.25 13.685 0.25 9.5 0.25 9.5C0.25 9.5 0.25 5.315 0.764125 3.31025C1.04988 2.20213 1.88575 1.33025 2.94438 1.0355C4.87038 0.5 11.5 0.5 11.5 0.5C11.5 0.5 18.133 0.5 20.0556 1.0355C21.1188 1.33475 21.9535 2.2055 22.2359 3.31025V3.31025ZM9.25 13.4375L16 9.5L9.25 5.5625V13.4375Z" fill="#C2C2C2"/>
                                            </svg>                                                                                               
                                        </a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="credit-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <p>All rights © ESoAn 2023</p>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <ul class="credit-links">
                                <!-- <li><a href="#0">Support</a></li> -->
                                <li><a href="{{ url('terms-and-conditions') }}">Terms & Conditions</a></li>
                                <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script  src="{{ asset('frontend/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.5.0/dist/sweetalert2.all.min.js"></script>
    <script  src="{{ asset('frontend/js/lenis.min.js')}}"></script>
    <script  src="{{ asset('frontend/js/main.js')}}"></script>
  
    <script>
    AOS.init();
</script>

<script>
    $('.journal_carousel').owlCarousel({
        stagePadding:80,
        loop:false,
        margin:30,
        nav:false,
        autoplay:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.5.0/dist/sweetalert2.all.min.js"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    var swal = Swal.mixin({
        backdrop: true,
        showConfirmButton: true,
    });

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    });
</script>

@if(Session::has('success'))
<script>
    
    setTimeout(function () {
        Toast.fire({
            title: "",
            text: '{{ Session::get('success') }}',
            icon: 'success'
        });
    }, 0); // Delay set to 0 to execute immediately
</script>
@endif



@if(Session::has('error'))
<script>
    setTimeout(function () {
        Toast.fire({
            title: "Error!",
            text: '{{ Session::get('error') }}',
            icon: 'error'
        });
    }, 0); // Delay set to 0 to execute immediately
</script>
@endif

</body>
</html>
     



