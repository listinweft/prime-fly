

@extends('web.layouts.main')
@section('content')
<main class="my-account">
            <div class="container">
                <div class="user-activity-container">
                @livewire('profile-form')
                    <div class="user-activity">
                        <div class="nav-pills-container">
                            <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                                <div class="slider"></div>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="pills-Blogs-tab" data-bs-toggle="pill" data-bs-target="#pills-Blogs" type="button" role="tab" aria-controls="pills-Blogs" aria-selected="true">Blogs</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="pills-Journals-tab" data-bs-toggle="pill" data-bs-target="#pills-Journals" type="button" role="tab" aria-controls="pills-Journals" aria-selected="false">Journals</button>
                                </li>
                            </ul>
                        </div>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Blogs" role="tabpanel" aria-labelledby="pills-Blogs-tab" tabindex="0">
                                <div class="user-activity-item-wraper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="user-activity-item">
                                                <div class="user-activity-item-image"><img src="{{ asset('frontend/images/user-profile-blog-1.jpg')}}" alt=""></div>
                                                <div class="user-activity-item-content">
                                                    <div class="active-user">
                                                        <div class="active-user-image"><img src="{{ asset('frontend/images/user-profile.png')}}" alt=""></div>
                                                        <div class="active-user-name">Grace Kelly</div>
                                                    </div>
                                                    <div class="active-user-achievement">
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.899 15.8875C8.61471 15.8875 8.33062 15.7795 8.11421 15.5633L1.44601 8.90418C-0.43226 7.02831 -0.488118 3.98589 1.32172 2.12223C2.23136 1.18578 3.45228 0.669922 4.75977 0.669922C6.03969 0.669922 7.24212 1.16691 8.14547 2.06915L8.89863 2.82138L9.64994 2.06933C10.5537 1.16691 11.7561 0.669922 13.0358 0.669922C14.3444 0.669922 15.5659 1.18541 16.4754 2.12149C18.2861 3.98497 18.231 7.02776 16.3522 8.904L9.68379 15.5633C9.46738 15.7793 9.18328 15.8875 8.899 15.8875ZM4.75977 1.42752C3.65888 1.42752 2.63087 1.86162 1.86513 2.65011C0.342354 4.2182 0.394513 6.78342 1.98129 8.36816L8.64949 15.0273C8.78728 15.1647 9.01108 15.1644 9.14851 15.0273L15.8169 8.36798C17.404 6.78287 17.4556 4.21746 15.9319 2.64937C15.1664 1.86144 14.1378 1.42752 13.0358 1.42752C11.9582 1.42752 10.946 1.84572 10.1856 2.60516L9.16701 3.62467C9.01904 3.773 8.77933 3.77263 8.63136 3.62504L7.61019 2.60516C6.84982 1.84572 5.83753 1.42752 4.75977 1.42752Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">56</div>
                                                        </div>
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.4071 7.77417C15.1881 3.97157 12.142 0.925517 8.33943 0.686611C6.18928 0.547249 4.15857 1.28388 2.60568 2.77704C1.11252 4.23039 0.256434 6.281 0.296252 8.39134C0.375887 12.3731 3.68076 15.678 7.64262 15.7974C9.01633 15.8373 10.3701 15.4988 11.5647 14.8219L14.9094 15.7775C14.9492 15.7974 14.989 15.7974 15.0288 15.7974C15.1284 15.7974 15.2478 15.7576 15.3075 15.678C15.4071 15.5784 15.4469 15.4192 15.4071 15.2798L14.3718 12.0745C15.1483 10.7804 15.5066 9.28724 15.4071 7.77417ZM13.6551 11.7161C13.5556 11.8754 13.5356 12.0546 13.5954 12.2338L14.4315 14.802L11.7837 14.0455C11.5846 13.9857 11.3855 14.0056 11.2063 14.1251C10.1312 14.7224 8.91679 15.0409 7.68244 15.0011C4.13866 14.9015 1.17224 11.9351 1.11252 8.37143C1.0727 6.48009 1.82923 4.64847 3.20295 3.33449C4.4572 2.12005 6.10964 1.46306 7.86162 1.46306C8.00098 1.46306 8.16025 1.46306 8.29961 1.48297C11.704 1.70196 14.4116 4.42948 14.6107 7.83389C14.6904 9.2076 14.3718 10.5415 13.6551 11.7161Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">8</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="user-activity-item">
                                                <div class="user-activity-item-image"><img src="{{ asset('frontend/images/user-profile-blog-2.jpg')}}" alt=""></div>
                                                <div class="user-activity-item-content">
                                                    <div class="active-user">
                                                        <div class="active-user-image"><img src="{{ asset('frontend/images/user-profile.png')}}" alt=""></div>
                                                        <div class="active-user-name">Grace Kelly</div>
                                                    </div>
                                                    <div class="active-user-achievement">
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.899 15.8875C8.61471 15.8875 8.33062 15.7795 8.11421 15.5633L1.44601 8.90418C-0.43226 7.02831 -0.488118 3.98589 1.32172 2.12223C2.23136 1.18578 3.45228 0.669922 4.75977 0.669922C6.03969 0.669922 7.24212 1.16691 8.14547 2.06915L8.89863 2.82138L9.64994 2.06933C10.5537 1.16691 11.7561 0.669922 13.0358 0.669922C14.3444 0.669922 15.5659 1.18541 16.4754 2.12149C18.2861 3.98497 18.231 7.02776 16.3522 8.904L9.68379 15.5633C9.46738 15.7793 9.18328 15.8875 8.899 15.8875ZM4.75977 1.42752C3.65888 1.42752 2.63087 1.86162 1.86513 2.65011C0.342354 4.2182 0.394513 6.78342 1.98129 8.36816L8.64949 15.0273C8.78728 15.1647 9.01108 15.1644 9.14851 15.0273L15.8169 8.36798C17.404 6.78287 17.4556 4.21746 15.9319 2.64937C15.1664 1.86144 14.1378 1.42752 13.0358 1.42752C11.9582 1.42752 10.946 1.84572 10.1856 2.60516L9.16701 3.62467C9.01904 3.773 8.77933 3.77263 8.63136 3.62504L7.61019 2.60516C6.84982 1.84572 5.83753 1.42752 4.75977 1.42752Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">56</div>
                                                        </div>
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.4071 7.77417C15.1881 3.97157 12.142 0.925517 8.33943 0.686611C6.18928 0.547249 4.15857 1.28388 2.60568 2.77704C1.11252 4.23039 0.256434 6.281 0.296252 8.39134C0.375887 12.3731 3.68076 15.678 7.64262 15.7974C9.01633 15.8373 10.3701 15.4988 11.5647 14.8219L14.9094 15.7775C14.9492 15.7974 14.989 15.7974 15.0288 15.7974C15.1284 15.7974 15.2478 15.7576 15.3075 15.678C15.4071 15.5784 15.4469 15.4192 15.4071 15.2798L14.3718 12.0745C15.1483 10.7804 15.5066 9.28724 15.4071 7.77417ZM13.6551 11.7161C13.5556 11.8754 13.5356 12.0546 13.5954 12.2338L14.4315 14.802L11.7837 14.0455C11.5846 13.9857 11.3855 14.0056 11.2063 14.1251C10.1312 14.7224 8.91679 15.0409 7.68244 15.0011C4.13866 14.9015 1.17224 11.9351 1.11252 8.37143C1.0727 6.48009 1.82923 4.64847 3.20295 3.33449C4.4572 2.12005 6.10964 1.46306 7.86162 1.46306C8.00098 1.46306 8.16025 1.46306 8.29961 1.48297C11.704 1.70196 14.4116 4.42948 14.6107 7.83389C14.6904 9.2076 14.3718 10.5415 13.6551 11.7161Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">8</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="user-activity-item">
                                                <div class="user-activity-item-image"><img src="{{ asset('frontend/images/user-profile-blog-3.jpg')}}" alt=""></div>
                                                <div class="user-activity-item-content">
                                                    <div class="active-user">
                                                        <div class="active-user-image"><img src="{{ asset('frontend/images/user-profile.png')}}" alt=""></div>
                                                        <div class="active-user-name">Grace Kelly</div>
                                                    </div>
                                                    <div class="active-user-achievement">
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.899 15.8875C8.61471 15.8875 8.33062 15.7795 8.11421 15.5633L1.44601 8.90418C-0.43226 7.02831 -0.488118 3.98589 1.32172 2.12223C2.23136 1.18578 3.45228 0.669922 4.75977 0.669922C6.03969 0.669922 7.24212 1.16691 8.14547 2.06915L8.89863 2.82138L9.64994 2.06933C10.5537 1.16691 11.7561 0.669922 13.0358 0.669922C14.3444 0.669922 15.5659 1.18541 16.4754 2.12149C18.2861 3.98497 18.231 7.02776 16.3522 8.904L9.68379 15.5633C9.46738 15.7793 9.18328 15.8875 8.899 15.8875ZM4.75977 1.42752C3.65888 1.42752 2.63087 1.86162 1.86513 2.65011C0.342354 4.2182 0.394513 6.78342 1.98129 8.36816L8.64949 15.0273C8.78728 15.1647 9.01108 15.1644 9.14851 15.0273L15.8169 8.36798C17.404 6.78287 17.4556 4.21746 15.9319 2.64937C15.1664 1.86144 14.1378 1.42752 13.0358 1.42752C11.9582 1.42752 10.946 1.84572 10.1856 2.60516L9.16701 3.62467C9.01904 3.773 8.77933 3.77263 8.63136 3.62504L7.61019 2.60516C6.84982 1.84572 5.83753 1.42752 4.75977 1.42752Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">56</div>
                                                        </div>
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.4071 7.77417C15.1881 3.97157 12.142 0.925517 8.33943 0.686611C6.18928 0.547249 4.15857 1.28388 2.60568 2.77704C1.11252 4.23039 0.256434 6.281 0.296252 8.39134C0.375887 12.3731 3.68076 15.678 7.64262 15.7974C9.01633 15.8373 10.3701 15.4988 11.5647 14.8219L14.9094 15.7775C14.9492 15.7974 14.989 15.7974 15.0288 15.7974C15.1284 15.7974 15.2478 15.7576 15.3075 15.678C15.4071 15.5784 15.4469 15.4192 15.4071 15.2798L14.3718 12.0745C15.1483 10.7804 15.5066 9.28724 15.4071 7.77417ZM13.6551 11.7161C13.5556 11.8754 13.5356 12.0546 13.5954 12.2338L14.4315 14.802L11.7837 14.0455C11.5846 13.9857 11.3855 14.0056 11.2063 14.1251C10.1312 14.7224 8.91679 15.0409 7.68244 15.0011C4.13866 14.9015 1.17224 11.9351 1.11252 8.37143C1.0727 6.48009 1.82923 4.64847 3.20295 3.33449C4.4572 2.12005 6.10964 1.46306 7.86162 1.46306C8.00098 1.46306 8.16025 1.46306 8.29961 1.48297C11.704 1.70196 14.4116 4.42948 14.6107 7.83389C14.6904 9.2076 14.3718 10.5415 13.6551 11.7161Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">8</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="user-activity-item">
                                                <div class="user-activity-item-image"><img src="{{ asset('frontend/images/user-profile-blog-4.jpg')}}" alt=""></div>
                                                <div class="user-activity-item-content">
                                                    <div class="active-user">
                                                        <div class="active-user-image"><img src="{{ asset('frontend/images/user-profile.png')}}" alt=""></div>
                                                        <div class="active-user-name">Grace Kelly</div>
                                                    </div>
                                                    <div class="active-user-achievement">
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M8.899 15.8875C8.61471 15.8875 8.33062 15.7795 8.11421 15.5633L1.44601 8.90418C-0.43226 7.02831 -0.488118 3.98589 1.32172 2.12223C2.23136 1.18578 3.45228 0.669922 4.75977 0.669922C6.03969 0.669922 7.24212 1.16691 8.14547 2.06915L8.89863 2.82138L9.64994 2.06933C10.5537 1.16691 11.7561 0.669922 13.0358 0.669922C14.3444 0.669922 15.5659 1.18541 16.4754 2.12149C18.2861 3.98497 18.231 7.02776 16.3522 8.904L9.68379 15.5633C9.46738 15.7793 9.18328 15.8875 8.899 15.8875ZM4.75977 1.42752C3.65888 1.42752 2.63087 1.86162 1.86513 2.65011C0.342354 4.2182 0.394513 6.78342 1.98129 8.36816L8.64949 15.0273C8.78728 15.1647 9.01108 15.1644 9.14851 15.0273L15.8169 8.36798C17.404 6.78287 17.4556 4.21746 15.9319 2.64937C15.1664 1.86144 14.1378 1.42752 13.0358 1.42752C11.9582 1.42752 10.946 1.84572 10.1856 2.60516L9.16701 3.62467C9.01904 3.773 8.77933 3.77263 8.63136 3.62504L7.61019 2.60516C6.84982 1.84572 5.83753 1.42752 4.75977 1.42752Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">56</div>
                                                        </div>
                                                        <div class="active-user-achievement-item">
                                                            <div class="active-user-achievement-item-icon">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.4071 7.77417C15.1881 3.97157 12.142 0.925517 8.33943 0.686611C6.18928 0.547249 4.15857 1.28388 2.60568 2.77704C1.11252 4.23039 0.256434 6.281 0.296252 8.39134C0.375887 12.3731 3.68076 15.678 7.64262 15.7974C9.01633 15.8373 10.3701 15.4988 11.5647 14.8219L14.9094 15.7775C14.9492 15.7974 14.989 15.7974 15.0288 15.7974C15.1284 15.7974 15.2478 15.7576 15.3075 15.678C15.4071 15.5784 15.4469 15.4192 15.4071 15.2798L14.3718 12.0745C15.1483 10.7804 15.5066 9.28724 15.4071 7.77417ZM13.6551 11.7161C13.5556 11.8754 13.5356 12.0546 13.5954 12.2338L14.4315 14.802L11.7837 14.0455C11.5846 13.9857 11.3855 14.0056 11.2063 14.1251C10.1312 14.7224 8.91679 15.0409 7.68244 15.0011C4.13866 14.9015 1.17224 11.9351 1.11252 8.37143C1.0727 6.48009 1.82923 4.64847 3.20295 3.33449C4.4572 2.12005 6.10964 1.46306 7.86162 1.46306C8.00098 1.46306 8.16025 1.46306 8.29961 1.48297C11.704 1.70196 14.4116 4.42948 14.6107 7.83389C14.6904 9.2076 14.3718 10.5415 13.6551 11.7161Z" fill="#484848"/>
                                                                </svg>                                                                    
                                                            </div>
                                                            <div class="active-user-achievement-item-count">8</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Journals" role="tabpanel" aria-labelledby="pills-Journals-tab" tabindex="0">
                                <!-- if posts  empty -->
                                <div class="empty-post">
                                    <svg width="136" height="97" viewBox="0 0 136 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M110.464 96.8883H25.5359C11.433 96.8883 0 85.4553 0 71.3523C0 57.2494 11.433 45.8164 25.5359 45.8164H110.464C124.567 45.8164 136 57.2494 136 71.3523C136 85.4553 124.567 96.8883 110.464 96.8883Z" fill="#D2D0D0"/>
                                        <path d="M68.0034 90.6268C87.8368 90.6268 103.915 74.5487 103.915 54.7153C103.915 34.8819 87.8368 18.8037 68.0034 18.8037C48.1699 18.8037 32.0918 34.8819 32.0918 54.7153C32.0918 74.5487 48.1699 90.6268 68.0034 90.6268Z" fill="#599AF2"/>
                                        <path d="M110.464 94.36H25.5359C11.433 94.36 0 82.9269 0 68.824C0 54.7211 11.433 43.2881 25.5359 43.2881H110.464C124.567 43.2881 136 54.7211 136 68.824C136 82.9269 124.567 94.36 110.464 94.36Z" fill="#DDDDDD"/>
                                        <path d="M82.216 80.1731C100.431 72.325 108.835 51.1967 100.987 32.9817C93.1389 14.7667 72.0106 6.36262 53.7956 14.2107C35.5806 22.0588 27.1766 43.1871 35.0247 61.4021C42.8727 79.6171 64.001 88.0211 82.216 80.1731Z" fill="#DDDDDD"/>
                                        <path d="M59.6048 52.5415C59.1753 52.5415 58.7523 52.3762 58.4285 52.0458C57.7875 51.3982 57.8007 50.3474 58.4483 49.7063L68.0838 40.2295L77.5672 49.7129C78.2149 50.3606 78.2149 51.4048 77.5672 52.0524C76.9196 52.7001 75.8754 52.7001 75.2278 52.0524L68.0573 44.882L60.7548 52.059C60.4441 52.3829 60.0212 52.5415 59.6048 52.5415Z" fill="#EE2C0D"/>
                                        <path d="M68.0057 65.6795C67.0937 65.6795 66.3535 64.9393 66.3535 64.0273V42.5623C66.3535 41.6503 67.0937 40.9102 68.0057 40.9102C68.9177 40.9102 69.6579 41.6503 69.6579 42.5623V64.0273C69.6579 64.9393 68.9177 65.6795 68.0057 65.6795Z" fill="#EE2C0D"/>
                                        <path d="M83.6206 75.8769H52.1435C49.8899 75.8769 48.0527 74.0397 48.0527 71.7861V60.3465C48.0527 59.4345 48.7929 58.6943 49.7049 58.6943C50.6169 58.6943 51.3571 59.4345 51.3571 60.3465V71.7861C51.3571 72.2223 51.7139 72.5726 52.1435 72.5726H83.6206C84.189 72.5726 84.6582 72.11 84.6582 71.535V60.3465C84.6582 59.4345 85.3984 58.6943 86.3104 58.6943C87.2224 58.6943 87.9625 59.4345 87.9625 60.3465V71.535C87.9559 73.9273 86.013 75.8769 83.6206 75.8769Z" fill="#EE2C0D"/>
                                    </svg>
                                    <p>No post yet, upload your first post and become a part of the community</p>   
                                    <h4>Upload Your First Post</h4>    
                                    <a href="" class="common-btn">Post</a>                            
                                </div>
                                <!-- // if posts  empty -->
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </main>
        @push('scripts')
        <script>
        AOS.init();


        $(".nav-pills button").click(function() {
  var position = $(this).parent().position();
  var width = $(this).parent().width();
    $(".slider").css({"left":+ position.left,"width":width});
});
var actWidth = $(".nav-pills").find(".active").parent("li").width();
var actPosition = $(".nav-pills .active").position();
$(".slider").css({"left":+ actPosition.left,"width": actWidth});

    </script> 
    <script>
        $(document).ready(function() {
            $('.profile_edit_icon').on('click', function() {
                $('.user-prof-btn').show();
                var that=$('.editable');
                var pname = $('.profilename');
                var pdesignation = $('.profile_designation');
                var pdetails = $('.profile_desc');
                var pemail = $('.profile_email');
                var ptel = $('.profile_tel');
                if (that.find('input').length > 0) {
                    return;
                }
                var nameText = pname.text();  
                var desigText = pdesignation.text(); 
                var descText = pdetails.text(); 
                var mailText = pemail.text(); 
                var telText = ptel.text();
                var $profinput = $('<input>').val(nameText)
                .css({
                    width: pname.width(),
                    height: pname.height(),
                });
                var $desiginput = $('<input>').val(desigText)
                .css({
                    width: pdesignation.width(),
                    height: pdesignation.height(),
                });
                var $descinput = $('<textarea>').val(descText)
                .css({
                    width: pdetails.width(),
                    height: pdetails.height(),
                });
                var $mailinput = $('<input>').val(mailText)
                .css({
                    width: pemail.width(),
                    height: pemail.height(),
                });
                var $telinput = $('<input>').val(telText)
                .css({
                    width: ptel.width(),
                    height: ptel.height(),
                });
                $(pname).append($profinput);
                $(pdesignation).append($desiginput);
                $(pdetails).append($descinput);
                $(pemail).append($mailinput);
                $(ptel).append($telinput);
                 
            });
            // Handle outside click
            $('user-prof-btn a').click(function(event) {

                if(!$(event.target).closest('.editable').length) {
                    if ($input.val()) {
                        that.text($input.val());
                    }
                    that.find('input').remove();
                }
                $('.user-prof-btn').hide();
            });
        });


    </script>
  @endpush
@endsection
