<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Mail\LandingPageMail;
use App\Models\BannerLandPage;
use App\Models\Business;
use App\Models\FeaturesLandPage;
use App\Models\GalleryLandPage;
use App\Models\LandingPage;
use App\Models\ServiceLandPage;
use App\Models\TestimonialsLandPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingPage = LandingPage::orderBy('id', 'DESC')
        ->get();
        $srno = 1;
        return view('landingpage.index', compact('landingPage', 'srno'));
    }
    public function getLandingPagesBySlugs()
{
    // Define an array of slugs
    $slugs = [
        '291-structural-repair-hopkinsville-ky',
        '291-basement-remodeling-clarksville-ky',
        '291-building-additions-elkton-ky',
        '291-deck-remodeling-madisonville-ky',
        '291-kitchen-remodeling-company-cadiz-ky',
        '292-Skylight-Roof-Gwinnett-County-GA',
        '292-Exterior-Pressure-Washing-Alpharetta-GA',
        '292-Commercial-Concrete-Cleaning-Rossville-GA',
        '292-Residential-Patios-Cleaning-Smyrna-GA',
        '292-Roof-Soft-Washing-Service-Marietta-GA',
        '293-walkway-cleaning-marietta-ga',
        '293-brick-cleaning-alpharetta-ga',
        '293-exterior-pressure-washing-buckhead-ga',
        '293-sidewall-cleaning-service-sandy-springs-ga',
        '293-soft-washing-service-roswell-ga',
        '294-auto-body-painting-abington-pa',
        '294-auto-body-shop-elkins-park-pa',
        '294-auto-collision-repair-roxborough-pa',
        '294-long-distance-towing-cherry-hill-nj',
        '294-medium-duty-towing-wilmington-de',
        '295-auto-coolant-leak-repair-blaine-mn',
        '295-auto-radiator-repair-elk-river-mn',
        '295-forklift-radiators-repair-coon-rapids-mn',
        '295-radiator-brazing-services-anoka-mn',
        '295-skid-loader-radiators-andover-mn',
        '296-boat-detailing-palm-bay-fl',
        '296-car-glass-coating-brevard-county-fl',
        '296-interior-ceramic-coating-sebastian-fl',
        '296-paint-polishing-indian-river-county-fl',
        '296-rv-detailing-st-lucie-county-fl',
        '297-basement-refinishing-services-mokena-il',
        '297-custom-cabinet-construction-joliet-il',
        '297-deck-installation-and-repair-frankfort-il',
        '297-handyman-services-tinley-park-il',
        '298-criminal-defense-services-houston-tx',
        '298-best-criminal-lawyer-dallas-tx',
        '299-basement-waterproofing-worcester-county-ma',
        '299-bathroom-renovation-middlesex-county-ma',
        '299-framing-new-walls-boston-ma',
        '299-kitchen-flooring-tile-norfolk-ma',
        '299-custom-room-addition-suffolk-ma',
        '300-asphalt-and-driveways-services-tesuque-nm',
        '300-fences-and-gates-installation-taos-nm',
        '300-gutter-repair-services-la-cienega-nm',
        '300-interior-and-exterior-painting-santa-fe-nm',
        '300-roof-leak-repair-eldorado-nm',
        '140-cash-for-junk-cars-without-title-katy-tx',
        '140-lost-title-cars-jersey-village-tx',
        '140-sell-my-car-with-a-minor-problem-bellaire-tx',
        '140-sell-my-car-with-a-title-loan-spring-tx',
        '140-we-buy-running-cars-sugar-land-tx',
        '301-home-maid-services-allen-tx',
        '301-affordable-house-cleaning-service-mckinney-tx',
        '301-move-out-cleaning-service-plano-tx',
        '301-move-in-cleaning-service-frisco-tx',
        '301-emergency-home-cleaning-the-colony-tx',
        '302-auto-detailing-service-bladenboro-nc',
        '302-engine-steam-cleaning-tar-heel-nc',
        '302-professional-ceramic-coating-chadbourn-nc',
        '303-insulation-removal-and-clean-up-will-county-il',
        '303-attic-radiant-barrier-insulation-cook-county-il',
        '303-insulation-services-for-attic-mchenry-county-il',
        '304-car-wraps-antelope-valley-ca',
        '304-vehicle-paint-protection-agua-dulce-ca',
        '304-window-tinting-for-homes-acton-ca',
        '305-detached-garage-construction-millville-ma',
        '305-guest-house-construction-blackstone-ma',
        '305-modular-home-construction-uxbridge-ma',
        '305-new-room-addition-bellingham-ma',
        '305-new-structure-construction-millville-ma',
        '305-single-family-home-construction-douglas-ma',
        '306-commercial-cabinet-painting-papillion-ne',
        '306-kitchen-epoxy-countertops-council-bluffs-ne',
        '306-interior-and-exterior-painting-ralston-ne',
        '306-new-cabinet-doors-painting-omaha-ne',
        '306-professional-cabinet-painter-elkhorn-ne',
        '306-residential-cabinet-refacing-gretna-ne',
        '108-auto-clay-bar-treatment-aurora-co',
        '108-auto-interior-shampoo-denver-co',
        '108-auto-polish-and-wax-parker-co',
        '108-car-hand-wash-highlands-ranch-co',
        '108-car-leather-conditioning-littleton-co',
        '308-flooding-services-sterling-va',
        '308-mold-remediation-services-chantilly-va',
        '308-smoke-and-fire-restoration-vienna-va',
        '308-water-damage-restoration-herndon-va',
        '308-water-mitigation-services-leesburg-va',
        '309-electrical-panels-upgrade-fort-lauderdale-fl',
        '309-lighting-design-miami-gardens-fl',
        '309-remodeling-services-hollywood-fl',
        '309-wire-repairs-service-miami-fl',
        '311-custom-shower-door-installation-bethesda-md',
        '311-residential-window-glass-installation-mclean-va',
        '311-storefront-glass-installation-washington-dc',
        '312-accent-lighting-installation-ypsilanti-mi',
        '312-electrical-panel-upgrades-romulus-mi',
        '312-garage-door-opener-replacement-bellevue-mi',
        '312-install-lighting-fixtures-canton-mi',
        '312-security-lighting-installation-westland-mi',
        '312-under-cabinet-lighting-installation-plymouth-mi',
        '313-electronic-gate-services-killeen-tx',
        '313-fences-and-gates-installation-services-temple-tx',
        '313-metal-roofing-services-harker-heights-tx',
        '313-power-washing-services-belton-tx',
        '313-tpo-roofing-services-salado-tx',
        '314-diesel-mechanic-concord-nc',
        '314-diesel-mechanic-service-rock-hill-sc',
        '314-diesel-trucks-computer-diagnostics-huntersville-nc',
        '314-truck-tire-service-gastonia-nc',
        '300-commercial-painting-services-los-alamos-nm',
        '300-masonry-and-concrete-services-placitas-nm',
        '300-residential-landscaping-services-eldorado-nm',
        '300-stucco-repair-rio-rancho-nm',
        '300-sunrooms-installation-bernalillo-nm',
        '315-garage-door-motor-repair-matthews-nc',
        '315-garage-door-repair-service-rock-hill-sc',
        '315-garage-door-roller-replacement-waxhaw-nc',
        '315-garage-door-spring-repair-concord-nc',
        '315-new-garage-door-installation-fort-mill-sc',
        '317-concrete-core-drilling-st-louis-county-mo',
        '317-concrete-driveway-repair-st-louis-city-mo',
        '317-demolition-service-st-louis-county-mo',
        '317-digging-service-st-louis-city-mo',
        '318-furniture-assembly-lewisville-tx',
        '318-junk-removal-service-coppell-tx',
        '318-moving-service-carrollton-tx',
        '319-fence-line-cleanup-sperry-ok',
        '319-garage-clean-up-services-catoosa-ok',
        '319-wood-and-metal-hauling-tulsa-ok',
        '321-all-types-of-concrete-work-thomas-ok',
        '321-concrete-services-norman-ok',
        '321-driveway-construction-oklahoma-city-ok',
        '321-parking-lots-construction-shawnee-ok',
        '321-patios-construction-moore-ok',
        '321-sidewalks-construction-newcastle-ok',
        '322-cash-for-junk-trucks-purcell-ok',
        '322-junk-car-removal-norman-ok',
        '322-same-day-cash-for-junk-cars-oklahoma-city-ok',
        '322-sell-my-junk-car-moore-ok',
        '322-title-and-non-title-vehicles-for-cash-shawnee-ok',
        '323-commercial-walk-in-cooler-service-waterford-lakes-fl',
        '323-heat-pump-installation-apopka-fl',
        '323-refrigeration-cooling-service-winter-park-fl',
        '323-residential-hvac-installation-service-davenport-fl',
        '323-residential-gas-furnace-repair-kissimmee-fl',
        '324-pest-control-bakersfield-ca',
        '324-termite-control-anaheim-ca',
        '324-pest-control-garden-grove-ca',
        '324-termite-control-orange-ca',
        '328-chimney-repair-service-redding-ct',
        '328-decking-repair-service-southbury-ct',
        '328-gutter-repair-service-watertown-ct',
        '328-home-additions-service-woodbridge-ct',
        '328-home-remodeling-service-shelton-ct',
        '329-air-quality-testing-algonquin-il',
        '329-dry-water-heater-service-barrington-il',
        '329-furnace-installation-and-repair-crystal-lake-il',
        '329-hvac-installation-and-repair-cary-il',
        '329-tankless-boilers-installation-and-maintenance-woodstock-il',
        '330-broken-glass-replacement-los-alamos-nm',
        '330-glass-and-screen-enclosures-santa-fe-nm',
        '330-residential-skylight-replacement-albuquerque-nm',
        '330-shower-doors-and-mirrors-espanola-nm',
        '330-windows-and-doors-replacements-taos-nm',
        '333-commercial-window-installation-west-valley-city-ut',
        '333-custom-windows-installation-salt-lake-city-ut',
        '333-door-installation-service-sandy-ut',
        '333-residential-windows-remodel-west-jordan-ut',
        '333-siding-installation-and-repair-draper-ut',
        '336-flat-roofing-service-north-providence-ri',
        '336-masonry-service-providence-ri',
        '336-metal-roofing-service-warwick-ri',
        '336-roofing-repair-service-cranston-ri',
        '336-vinyl-siding-service-johnston-ri',
        '342-bathroom-remodeling-service-queen-annes-county-md',
        '342-interior-and-exterior-painting-dorchester-county-md',
        '342-kitchen-remodeling-service-talbot-county-md',
        '342-laminate-flooring-service-kent-county-md',
        '342-tile-installation-and-repair-caroline-county-md',
        '321-concrete-driveways-construction-tuttle-ok',
        '345-affordable-moving-service-oxnard-ca',
        '345-furniture-assembling-and-disassembling-ventura-ca',
        '345-furniture-donations-service-calabasas-ca',
        '345-long-distance-moving-camarillo-ca',
        '345-professional-packing-service-thousand-oaks-ca',
        '345-waste-removal-services-santa-barbara-ca',
        '346-drywall-installation-services-fort-lauderdale-fl',
        '346-exterior-painting-service-boynton-beach-fl',
        '346-interior-painting-service-boca-raton-fl',
        '346-popcorn-removal-services-delray-beach-fl',
        '346-power-washing-services-palm-beach-fl',
        '110-garage-door-installation-hensley-ar',
        '110-garage-door-roller-replacement-east-end-ar',
        '110-garage-door-spring-repair-bauxite-ar',
        '348-bathroom-countertop-installation-encinitas-ca',
        '348-bathroom-remodeling-escondido-ca',
        '348-flooring-installation-vista-ca',
        '348-kitchen-countertop-installation-san-marcos-ca',
        '348-porcelain-slab-installation-carlsbad-ca',
        '348-tile-installation-oceanside-ca',
        '255-bedbugs-control-kitchener-on',
        '255-bedbugs-control-services-waterloo-on',
        '255-cockroach-control-services-brantford-on',
        '255-mice-control-services-guelph-on',
        '255-pest-control-services-cambridge-on',
        '361-affordable-home-inspection-services-babylon-ny',
        '361-best-home-inspection-services-fresh-meadows-ny',
        '361-comprehensive-home-inspection-services-huntington-ny',
        '361-detailed-home-inspection-services-roslyn-ny',
        '361-full-home-inspection-services-great-neck-ny',
        '328-new-deck-installation-southbury-ct',
        '110-garage-door-cable-replacement-bryant-ar',
        '110-garage-door-opener-replacement-conway-ar',
        '110-garage-door-repair-hot-springs-ar',
        '110-garage-door-spring-replacement-lonsdale-ar',
        '365-fix-off-track-garage-door-peoria-az',
        '365-garage-door-cable-repair-sun-city-west-az',
        '365-garage-door-repair-surprise-az',
        '365-garage-door-openers-repair-glendale-az',
        '365-garage-door-roller-installation-phoenix-az',
        '365-garage-door-safety-sensors-installation-avondale-az',
        '365-garage-door-spring-replacement-tolleson-az',
        '368-concrete-driveways-installation-roy-ut',
        '368-concrete-patios-construction-hooper-ut',
        '368-concrete-retaining-walls-ogden-ut',
        '368-demolition-services-syracuse-ut',
        '368-shed-pads-west-haven-ut',
        '371-commercial-pressure-washing-warren-mi',
        '371-highrise-building-cleaning-macomb-county-mi',
        '371-industrial-cleaning-grosse-pointe-mi',
        '371-machine-degreasing-birmingham-mi',
        '371-parking-garage-cleaning-bloomfield-twp-mi',
        '371-property-cleaning-management-oakland-county-mi',
        '371-residential-power-washing-troy-mi',
        '371-shopping-malls-cleaning-sterling-heights-mi',
        '371-soft-washing-detroit-mi',
        '371-warehouse-cleaning-shelby-charter-township-mi',
        '373-basement-walls-repair-philadelphia-pa',
        '373-brick-pointing-pottstown-pa',
        '373-chimney-repairs-browns-mills-pa',
        '373-stone-pointing-king-of-prussia-pa',
        '373-through-the-wall-air-conditioner-norristown-pa',
        '374-commercial-landscape-design-murfreesboro-tn',
        '374-commercial-pruning-and-trimming-nashville-tn',
        '374-fire-ant-control-columbia-tn',
        '374-lawn-disease-control-franklin-tn',
        '374-weed-control-services-brentwood-tn',
        '375-buy-junk-cars-fairview-park-oh',
        '375-car-towing-brooklyn-oh',
        '375-light-duty-tow-cleveland-oh',
        '375-medium-duty-tow-cleveland-heights-oh',
        '375-towing-services-lakewood-oh',
        '330-residential-glass-tinting-santa-fe-nm',
        '330-residential-windows-glass-replacement-espanola-nm',
        '330-skylight-installation-and-repair-taos-nm',
        '330-tub-and-shower-enclosures-albuquerque-nm',
        '330-storefront-glass-installation-los-alamos-nm',
        '345-commercial-packing-services-oxnard-ca',
        '345-furniture-delivery-services-camarillo-ca',
        '345-house-moving-services-thousand-oaks-ca',
        '345-interstate-moving-services-calabasas-ca',
        '345-out-of-state-moving-ventura-ca',
        '368-concrete-removal-brigham-city-ut',
        '374-commercial-irrigation-services-murfreesboro-tn',
        '374-lawn-flea-extermination-columbia-tn',
        '374-mole-trapping-service-brentwood-tn',
        '379-affordable-roof-repair-service-wallingford-ct',
        '379-concrete-power-washing-new-haven-ct',
        '379-residential-siding-repair-southington-ct',
        '379-roof-power-washing-service-new-britain-ct',
        '379-skylight-repair-service-glastonbury-ct',
        '380-best-roadside-assistance-hampton-va',
        '380-buy-cars-with-minor-problems-newport-news-va',
        '380-cash-for-junk-cars-virginia-beach-va',
        '380-junk-car-for-cash-suffolk-va',
        '380-non-title-cars-for-cash-chesapeake-va',
        '380-with-title-cars-for-cash-portsmouth-va',
        '381-ant-extermination-service-chandler-az',
        '381-general-pest-control-services-gilbert-az',
        '381-professional-rodent-control-service-mesa-az',
        '381-scorpion-control-service-tempe-az',
        '381-wasp-extermination-service-ahwatukee-az',
            ];

    // Query the database for landing pages with these slugs
    $landingPages = LandingPage::whereIn('slug', $slugs)->get();
    return view('FrontEnd.landpage', compact('landingPages'));
}
    public function show($slug)
    {
        $land_page = LandingPage::where('slug', $slug)->first();
        return view('websitePage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = Business::all();
        return view('landingpage.add', compact('business'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->services_check == true) {
        //     dd("sdfjhsdkjf");
        // }


        $request->validate([
            'title' => 'required',
            'slug' => 'required | unique:landing_pages,slug',
            'business_id' => 'required',
        ]);
        $businessId = Business::where('id', $request->business_id)->pluck('lp_id')->first();
        // dd($businessId);
        $slug = Str::slug($request->slug);
        $comp_slug = $businessId.'-'.$slug;
        $about = $request->only('about_heading','about_description');
        $about_encoded = json_encode($about);
        $content = $request->only('content_title', 'content_description');
        $content_encoded = json_encode($content);
        if(isset($request->logo )) {
            $logo_path = GlobalHelper::fts_landpage_img($request->logo, 'logo');
        }
        else {
            $logo_path = "";
        }

        $landingPage = LandingPage::create([
            'business_id' => $request->business_id,
            'title' => $request->title,
            'slug' => $comp_slug,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'about_check' => $request->about_check? 1 : 0,
            'content_check' => $request->content_check? 1 : 0,
            'about_us' => $about_encoded,
            'content' => $content_encoded,
            'address' =>$request->address,
            'google_map' => $request->google_map,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' => $logo_path,
            'form_check' => $request->form_check? 1 : 0,
            'video_check' => $request->video_check? 1 : 0,
            'service_check' => $request->service_check? 1 : 0,
            'testimonial_check' => $request->testimonial_check? 1 : 0,
            'gallery_check' => $request->gallery_check? 1 : 0,
            'feature_check' => $request->feature_check? 1 : 0,
            'status' => $request->status? 1 : 0,

        ]);
        $landingPage_id = $landingPage->id;

        // dd($request->service_check);

        if($request->service_check == true && count($request->service_title) > 0) {
            // dd($request->service_title);

            foreach ($request->service_title as $key=>$title) {
                // dd($key, $request->service_description);
                if(isset($title)) {
                    $service['land_page_id'] = $landingPage_id;
                    $service['service_title'] = $title;
                    $service['service_description'] = $request->service_description[$key];
                    ServiceLandPage::create($service);
                }
            }
        }
        // dd($service);
        // dd($request->all());

        if($request->feature_check == true && count($request->feature_title) > 0) {
            // $service
            foreach ($request->feature_title as $key=>$title) {
                if(isset($title)) {
                    $feature['land_page_id'] = $landingPage_id;
                    $feature['feature_title'] = $title;
                    $feature['feature_description'] = $request->feature_description[$key];
                    FeaturesLandPage::create($feature);
                }
            }
        }

        if($request->testimonial_check == true && isset($request->testimonial_title)) {
            // $testimonial
            foreach ($request->testimonial_title as $key=>$title) {
                if(isset($title)) {
                    $testimonial['land_page_id'] = $landingPage_id;
                    $testimonial['testimonial_title'] = $title;
                    $testimonial['testimonial_description'] = $request->testimonial_description[$key];
                    TestimonialsLandPage::create($testimonial);
                }
            }
        }

        if( $request->gallery_check == true && count($request->gallery_image) > 0) {
            foreach($request->gallery_image as $image) {
                $gallery['land_page_id'] = $landingPage_id;
                $gallery['image'] = GlobalHelper::fts_landpage_img($image, 'gallery');
                GalleryLandPage::create($gallery);
            }
        }

       if(isset($request->banner_heading)){
            $banner['heading'] = $request->banner_heading;
            $banner['subheading'] = $request->banner_subheading;
            $banner['heading_color'] = $request->banner_heading_color;
            $banner['subheading_color'] = $request->banner_subheading_color;
            $banner['overly_color'] = $request->overly_color;
            $banner['overly_opacity'] = $request->overly_opacity;
            $banner['mobile_overly'] = $request->overly_mobile;
            $banner['desktop_image'] = GlobalHelper::fts_landpage_img($request->desktop_image, 'desk_banner');
            $banner['mobile_image'] = GlobalHelper::fts_landpage_img($request->mobile_image, 'mob_banner');
            $banner['land_page_id'] = $landingPage_id;
            BannerLandPage::create($banner);
       }

       Alert::success('Success', "LandingPage Added Successfully");
       return redirect()->route('landingpage.index');

    }

    /**
     * Display the specified resource.



     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $land_page = LandingPage::find($id);
       $business = Business::all();
       $about = json_decode($land_page->about_us);
       $content = json_decode($land_page->content);
    //    dd($land_page);
       return view('landingpage.edit', compact('land_page','business', 'about','content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // dd($request->gallery_image);
        $request->validate([
            'title' => 'required',
            'slug' => 'required | unique:landing_pages,slug,'.$id,
        ]);

        $landingPage = LandingPage::find($id);
        $slug = preg_replace('/\s+/', '-', $request->slug);
        $about = $request->only('about_heading','about_description');
        $about_encoded = json_encode($about);
        $content = $request->only('content_title', 'content_description');
        $content_encoded = json_encode($content);
        if(isset($request->logo)) {
            if($landingPage->logo != "") {
                GlobalHelper::delete_landpage_img($landingPage->logo, 'logo');
            }
            $logo_path = GlobalHelper::fts_landpage_img($request->logo, 'logo');
            // dd($logo_path);
        }
        else {
            $logo_path = "";
        }
        $landingPage->update([
            'business_id' => $request->business_id,
            'title' => $request->title,
            'slug' => $slug,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'about_check' => $request->about_check? 1 : 0,
            'content_check' => $request->content_check? 1 : 0,
            'about_us' => $about_encoded,
            'content' => $content_encoded,
            'address' =>$request->address,
            'google_map' => $request->google_map,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' => $logo_path,
            'form_check' => $request->form_check? 1 : 0,
            'video_check' => $request->video_check? 1 : 0,
            'service_check' => $request->service_check? 1 : 0,
            'testimonial_check' => $request->testimonial_check? 1 : 0,
            'gallery_check' => $request->gallery_check? 1 : 0,
            'feature_check' => $request->feature_check? 1 : 0,
            'status' => $request->status? 1 : 0,
        ]);

        if($request->service_check == true) {
            // dd("fsgdg");
            foreach ($request->service_title as $key=>$title) {
                // dd($key, $request->service_description);
                if(isset($title)) {
                    $service['land_page_id'] = $landingPage->id;
                    $service['service_title'] = $title;
                    $service['service_description'] = $request->service_description[$key];
                    $old_data=ServiceLandPage::where('id',$request->service_ids[$key])->get();
                        if(isset($old_data) and sizeof($old_data)>0)
                        {
                            ServiceLandPage::where('id',$request->service_ids[$key])->update($service);
                        }
                        else
                        {
                            ServiceLandPage::create($service);
                        }
                }
            }
        }
        if($request->feature_check == true ) {
            // $service
            foreach ($request->feature_title as $key=>$title) {
                if(isset($title)) {
                    $feature['land_page_id'] = $landingPage->id;
                    $feature['feature_title'] = $title;
                    $feature['feature_description'] = $request->feature_description[$key];
                    $old_data=FeaturesLandPage::where('id',$request->feature_ids[$key])->get();
                    if(isset($old_data) and sizeof($old_data)>0)
                        {
                            FeaturesLandPage::where('id',$request->feature_ids[$key])->update($feature);
                        }
                        else
                        {
                            FeaturesLandPage::create($feature);
                        }

                }
            }
        }

        if($request->testimonial_check == true ) {
            // dd("dfsdf");
            // $testimonial
            foreach ($request->testimonial_title as $key=>$title) {
                if(isset($title)) {
                    $testimonial['land_page_id'] = $landingPage->id;
                    $testimonial['testimonial_title'] = $title;
                    $testimonial['testimonial_description'] = $request->testimonial_description[$key];
                    $old_data=TestimonialsLandPage::where('id',$request->testimonial_ids[$key])->get();
                    if(isset($old_data) and sizeof($old_data)>0)
                        {
                            TestimonialsLandPage::where('id',$request->testimonial_ids[$key])->update($testimonial);
                        }
                        else
                        {
                            TestimonialsLandPage::create($testimonial);
                        }

                }
            }
        }

        if(isset($request->banner_heading)){


            $banner['heading'] = $request->banner_heading;
            $banner['subheading'] = $request->banner_subheading;
            $banner['heading_color'] = $request->banner_heading_color;
            $banner['subheading_color'] = $request->banner_subheading_color;
            $banner['overly_color'] = $request->overly_color;
            $banner['overly_opacity'] = $request->overly_opacity;
            $banner['mobile_overly'] = $request->overly_mobile;
            if(isset($request->desktop_image)){
            $banner['desktop_image'] = GlobalHelper::fts_landpage_img($request->desktop_image, 'desk_banner');
            }
            if(isset($request->mobile_image)){
            $banner['mobile_image'] = GlobalHelper::fts_landpage_img($request->mobile_image, 'mob_banner');
            }
            $banner['land_page_id'] = $landingPage->id;
            $old_data=BannerLandPage::where('id',$request->banner_id)->get();
                if(isset($old_data) and sizeof($old_data)>0)
                    {
                        BannerLandPage::where('id',$request->banner_id)->update($banner);
                    }
                    else
                    {
                        BannerLandPage::create($banner);
                    }
        }
        if( $request->gallery_check == true) {
            if(isset($request->gallery_image )){
                foreach($request->gallery_image as $image) {
                $gallery['land_page_id'] = $landingPage->id;
                 if(isset($image)){
                    $gallery['image'] = GlobalHelper::fts_landpage_img($image, 'gallery');
                 }
                GalleryLandPage::create($gallery);
            }
                // foreach($request->gallery_image as $image) {
                //     $gallery['land_page_id'] = $landingPage->id;
                //     if(isset($image)){
                //         $gallery['image'] = GlobalHelper::fts_landpage_img($image, 'gallery');
                //     }
                //     GalleryLandPage::create($gallery);
                // }
            }
        }




        Alert::success('Success', "LandingPage Updated Successfully");
       return redirect()->route('landingpage.index');




    }

    public function logo_del(Request $request)
    {
        if($request->ajax()){
            $landingPage = LandingPage::find($request->landingPage_id);
            $logo = $landingPage->logo;
            if(isset($logo)){
                GlobalHelper::delete_landpage_img($logo, 'logo');
                $landingPage->logo = "";
                $landingPage->save();
            }
            return response()->json(['logo' => $logo]);
        }
    }
    public function deletebanner(Request $request)
    {
        if($request->ajax()){
            $landingPage = LandingPage::find($request->landingPage_id);
            $banner = BannerLandPage::where('land_page_id' , $landingPage->id)->first();
            if(isset($banner)){
                GlobalHelper::delete_landpage_img($banner->desktop_image, 'desk_banner');
                $banner->desktop_image = "";
                $banner->save();
            }
            return response()->json(['banner' => $banner]);
        }
    }
    public function bannermob(Request $request)
    {
        if($request->ajax()){
            $landingPage = LandingPage::find($request->landingPage_id);
            $banner = BannerLandPage::where('land_page_id' , $landingPage->id)->first();
            if(isset($banner)){
                GlobalHelper::delete_landpage_img($banner->mobile_image, 'mob_banner');
                $banner->mobile_image = "";
                $banner->save();
            }
            return response()->json(['banner' => $banner]);
        }
    }
        public function galleryrem(Request $request)
    {
        // dd($request->all());
        if($request->ajax()){
            $landingPage = LandingPage::find($request->landingPage_id);
            $gallery = GalleryLandPage::where('id' , $request->image_id)->where('land_page_id', $landingPage->id)->first();
            if(isset($gallery)){
                GlobalHelper::delete_landpage_img($gallery->image, 'gallery');
                $gallery->delete();
            }
            return response()->json(['gallery' => $gallery]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage  $landingPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landingPage = LandingPage::find($id);

        if($landingPage->logo != "") {
            GlobalHelper::delete_landpage_img($landingPage->logo, 'logo');
        }
        $landingPage->service()->delete();
        $landingPage->features()->delete();
        $landingPage->testimonial()->delete();
        // if(isset($landingPage->banner)) {
        //     foreach($landingPage->banner as $banner){
        //         GlobalHelper::delete_landpage_img($banner->desktop_image, 'desk_banner');
        //         GlobalHelper::delete_landpage_img($banner->mobile_image,'mob_banner');
        //     }
        // }
        if(count($landingPage->gallery) > 0){
            foreach($landingPage->gallery as $gallery){
                GlobalHelper::delete_landpage_img($gallery->image, 'gallery');
            }
        }
        $landingPage->delete();
        Alert::success('Success', "LandingPage Deleted Successfully");
        return redirect()->route('landingpage.index');
    }
    public function form(Request $request)
    {
        try {
            $data = $this->validate($request,[
                'name'=>'required',
                'email'=>'required',
                'subject'=>'required',
                'message'=>'required',
                'slug'=> 'required',
            ]);



            $landPage = LandingPage::where('id',$request->email_id)->first();
            // dd($landPage);

            if(isset($landPage->email))
            {
                $email = $landPage->email;
                // dd($email);

                // if (Str::endsWith($email, '@gmail.com')) {
                //     // The email is a Gmail address
                //     dd("This is a Gmail address.");
                // } else {
                //     // The email is not a Gmail address
                //     dd("This is not a Gmail address.");
                // }
                Mail::to($email)->send(new LandingPageMail($data));
                Mail::to('daniel@firmtechsol.com')->send(new LandingPageMail($data));
                Alert::success('Success', "Your Message has been Sent");
                return redirect()->back();
            }
            else{

                $business = Business::where('id',$request->business_id)->first();
                $clientEmail = $business->email;
                dd($clientEmail);
                Mail::to($clientEmail)->send(new LandingPageMail($data));
                Mail::to('daniel@firmtechsol.com')->send(new LandingPageMail($data));
                Alert::success('Success', "Your Message has been Sent");
                return redirect()->back();

            }
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }

    }
    
    public function getData(Request $request)
    {
        try {
        // dd($request->all());
        $business_id = $request->business_id;
        $landingPage = LandingPage::where('business_id', $business_id)->with('service', 'features')->latest()->first();
        return response()->json([
            'message' => 'Sale added successfully!',
            'landingPage' => $landingPage,
        ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }
}
