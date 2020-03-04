
<section class="main-footer footer-style-two text-center" id="contact"> 
    <!--Widgets Section-->
    <div class="widgets-section">
        <div class="container">
            <div class="row clearfix">
                <!--Footer Column-->
                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget bottom-widget">
                        <h3 class="has-line-center">{{ Lang::get('footer.Useful_Links') }}</h3>
                        <div class="widget-content">
                            <ul>
                                @if(isset($arrFooter1PageData) && count($arrFooter1PageData) > 0)
                                @foreach($arrFooter1PageData as $pageData)
                                <li>
                                    <a href="{{route('cms', @$pageData->slug_url)}}">{{ @$pageData->page_title }}</a>
                                </li>
                                @endforeach
                                @endif
                                @if(Auth::check())
                                <li><a href="{{ route('contact_support') }}">{{ Lang::get('home-menu.Contact_support') }}</a></li>
                                @endif
                                <li><a href="{{ @$arrSettingData['blog_url'] }}" target="_blank">{{ Lang::get('home-menu.Blog') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Footer Column-->

                <!--Footer Column-->
                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget bottom-widget">
                        <h3 class="has-line-center line-none">&nbsp;</h3>
                        <div class="widget-content">
                            <ul>
                                <li><a href="">{{ Lang::get('home-menu.Frequently_Asked_Questions') }}</a></li>
                                @if(isset($arrFooter2PageData) && count($arrFooter2PageData) > 0)
                                @foreach($arrFooter2PageData as $pageData)
                                <li>
                                    <a href="{{route('cms', @$pageData->slug_url)}}">{{ @$pageData->page_title }}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Footer Column-->

                <!--Footer Column-->
                <div class="footer-column col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-widget bottom-widget">
                        <h3 class="has-line-center">{{ Lang::get('welcome.About_OTC') }}</h3>
                        <div class="widget-content footer-tra" id="bounty">
                            <h2>{{ Lang::get('welcome.Why_Choose') }}</h2>
                            <div class="text"></div>
                            <ul>
                                <li class="medium_link"><a href="" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="Medium"><i class="fa fa-medium"></i></a></li>
                                <li class="facebook_link"><a href="" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter_link"><a href="" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li class="linkedin_link"><a href="" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="Linkdin"><i class="fa fa-linkedin"></i></a></li>
                                <li class="github_link"><a href="" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="Github"><i class="fa fa-github"></i></a></li>
                                <li class="mail_link"><a href="mailto:" target="_blank" rel="noopener noreferrer" data-toggle="tooltip" title="mail"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <h4 class="text-center"><span></span>
                <span>
                    @if(isset($arrBottomPageData) && count($arrBottomPageData) > 0)
                    @foreach($arrBottomPageData as $k => $pageData)
                    <a href="{{route('cms', @$pageData->slug_url)}}">{{ @$pageData->page_title }}</a>
                    @if($k <= (count($arrBottomPageData)-2))
                    |
                    @endif
                    @endforeach
                    @endif
                </span>
            </h4>
        </div>
    </div>
    <!--End Footer Column-->
</section>