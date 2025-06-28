
<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GoogleCalendarController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\RecognitionController;
use App\Http\Controllers\Admin\AdvisoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LivestreamController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MembersController; 
use App\Http\Controllers\Admin\FacilitatorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ConsultantController;
use App\Http\Controllers\Admin\CoreActivitiesController; 
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\VisionMissionController;
use App\Http\Controllers\Admin\SociallinkController; 
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\MentorshipController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactFormController;
use App\Http\Controllers\Admin\AdovacyPolicyController;
use App\Http\Controllers\Admin\AdvisoryBoardMemberController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\TermsConditionController;


 
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/manage/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/manage/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
     
    Route::middleware(['auth.admin'])->group(function () {
        Route::post('/settings/update-password', [AdminLoginController::class, 'updatePassword'])->name('admin.password.update');
        Route::get('/settings/show-password', [AdminLoginController::class, 'showChangePasswordForm'])->name('admin.show.password');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
       
        // Menu
        Route::get('/menu/create', [MenuController::class, 'creatMenu'])->name('admin.menu.create');
        Route::get('/manage/menu/index', [MenuController::class, 'indexMenu'])->name('admin.menu.index');
        Route::post('/menu', [MenuController::class, 'storeMenu'])->name('admin.menu.store');
        Route::get('/menu/{id}/edit', [MenuController::class, 'editMenu'])->name('admin.menu.edit');
        Route::put('/menu/{id}', [MenuController::class, 'updateMenu'])->name('admin.menu.update');
        Route::delete('/menu/{id}', [MenuController::class, 'destroyMenu'])->name('admin.menu.destroy');
        //Slider  
        Route::get('/manage/sliderIndex', [SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/manage/sliderCreate', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::put('/slider/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::get('/slider/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
        //Why choose us 
        Route::get('/settings/content', [SettingsController::class, 'WhyChooseUs'])->name('admin.settings.content');
        Route::post('/settings/store/why-choose-us', [SettingsController::class, 'storeWhyChooseUs'])->name('admin.settings.store_why_choose_us');
        Route::put('/settings/update/why-choose-us/{id}', [SettingsController::class, 'updateWhyChooseUs'])->name('admin.settings.update_why_choose_us');
          
        //User
        Route::name('admin.')->group(function () {
            Route::resource('users', UserController::class);
            Route::post('/users/multi-delete', [UserController::class, 'multiDelete'])
            ->name('users.multi-delete');
            // Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            // Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
            Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
            Route::post('/users/{user}/remove-admin', [UserController::class, 'removeAdmin'])->name('users.remove-admin');

        }); 
       
        //Application
        Route::name('admin.')->group(function () {
            Route::resource('application', ApplicationController::class);
            Route::resource('recognition', RecognitionController::class);
            Route::resource('advisory', AdvisoryController::class);
            Route::get('certifications/index', [CertificationController::class, 'index'])->name('certifications.index');
            Route::get('certifications/create', [CertificationController::class, 'create'])->name('certifications.create');
            Route::post('certifications/store', [CertificationController::class, 'store'])->name('certifications.store');
            Route::get('certifications/edit/{id}', [CertificationController::class, 'edit'])->name('certifications.edit');
            Route::put('certifications/update/{id}', [CertificationController::class, 'update'])->name('certifications.update');
            Route::delete('certifications/destroy/{id}', [CertificationController::class, 'destroy'])->name('certifications.destroy');
        });
       
        //About us
        Route::get('/settings/about-us', [SettingsController::class, 'getAboutUs'])->name('admin.settings.aboutUs');
        Route::get('/about-us', [AboutUsController::class, 'index'])->name('admin.about-us');
        Route::post('/about-us/store', [AboutUsController::class, 'store'])->name('admin.aboutus.store');
        Route::put('/update/about-us/{id}', [AboutUsController::class, 'update'])->name('admin.aboutus.update');
       
       
        // AdovacyPolicy
        Route::get('/advocacyPolicy', [AdovacyPolicyController::class, 'index'])->name('admin.advocacyPolicy');
        // Route::get('/members-benefit', [AdovacyPolicyController::class, 'membersBenefit'])->name('admin.members.membersBenefit');
        Route::post('/policies-governance/post', [AdovacyPolicyController::class, 'policiesGovernanceStore'])->name('admin.policiesGovernanceFramework.store');
        Route::put('/policies-governance/update/{id}', [AdovacyPolicyController::class, 'policiesGovernanceUpate'])->name('admin.policiesGovernanceFramework.update');
       
        // advisoryBoardMember
        Route::get('/advisory-board-member', [AdvisoryBoardMemberController::class, 'index'])->name('admin.advisoryBoardMember.index');
        Route::get('/advisory-board-member/create', [AdvisoryBoardMemberController::class, 'create'])->name('admin.advisoryBoardMember.create');
        Route::post('/advisory-board-member/store', [AdvisoryBoardMemberController::class, 'store'])->name('admin.advisoryBoardMember.store');
        Route::get('/advisory-board-member/edit/{id}', [AdvisoryBoardMemberController::class, 'edit'])->name('admin.advisoryBoardMember.edit');
        Route::put('/advisory-board-member/update/{id}', [AdvisoryBoardMemberController::class, 'update'])->name('admin.advisoryBoardMember.update');
        Route::get('/advisory-board-member/delete/{id}', [AdvisoryBoardMemberController::class, 'destroy'])->name('admin.advisoryBoardMember.destroy');

       
        
        //Core Value 
        Route::get('/settings/core-value', [CoreValueController::class, 'index'])->name('admin.coreValue.index');
        Route::post('/settings/store/core-value', [CoreValueController::class, 'store'])->name('admin.coreValue.store');
        Route::put('/settings/update/core-value/{id}', [CoreValueController::class, 'update'])->name('admin.coreValue.update');
        //visionMission
        Route::get('/settings/vision-mission', [VisionMissionController::class, 'index'])->name('admin.visionMission.index');
        Route::post('/settings/vision-mission/store', [VisionMissionController::class, 'store'])->name('admin.visionMission.store');
        Route::put('/settings/vision-mission/update/{id}', [VisionMissionController::class, 'update'])->name('admin.visionMission.update');
        
        //Office Hours 
        Route::get('/settings/office/hours/index', [SettingsController::class, 'indexOfficeHours'])->name('admin.officeHours.index');
        Route::post('/settings/store/office-hours', [SettingsController::class, 'storeOfficeHours'])->name('admin.office-hours.store');
        Route::put('/settings/update/office-hours/{id}', [SettingsController::class, 'updatestoreOfficeHours'])->name('admin.office-hours.update');
          
        //Contact Us 
        Route::get('/settings/contact-us', [SettingsController::class, 'getcontactUs'])->name('admin.settings.contactUs');
        Route::post('/settings/store/contact-us', [SettingsController::class, 'storeContactUs'])->name('admin.settings.storeContactUs');
        Route::put('/settings/update/contact-us/{id}', [SettingsController::class, 'updateContactUs'])->name('admin.settings.updateContactUs');
        //Social Links 
        Route::get('/sociallinks/index', [SociallinkController::class, 'index'])->name('admin.socialLink.index');
        Route::post('/settings/store/social-links', [SociallinkController::class, 'storeSocialLinks'])->name('admin.settings.storeSocialLinks');
        Route::put('/settings/update/social-links/{id}', [SociallinkController::class, 'updateSocialLinks'])->name('admin.settings.updateSocialLinks');
       
        //Membership Controller
        Route::get('/membership/index', [MembershipController::class, 'index'])->name('admin.membership.index');
        Route::post('/membership/store', [MembershipController::class, 'store'])->name('admin.membership.store');
        Route::put('/membership/update/{id}', [MembershipController::class, 'update'])->name('admin.membership.update');

        Route::get('/membership/plan/index', [MembershipController::class, 'plan'])->name('admin.membership.plan.index');
        Route::get('/membership/plan/create', [MembershipController::class, 'createPlan'])->name('admin.membership.plan.create');
        Route::post('/membership/plan/store', [MembershipController::class, 'storePlan'])->name('admin.membership.plan.store');
        Route::get('/membership/plan/edit/{id}', [MembershipController::class, 'editPlan'])->name('admin.membership.plan.edit'); 
        Route::put('/membership/plan/update/{id}', [MembershipController::class, 'updatePlan'])->name('admin.membership.plan.update');
        Route::delete('/membership/plan/destroy/{id}', [MembershipController::class, 'destroyPlan'])->name('admin.membership.plan.destroy');

        
        Route::get('/membership/criteria/index', [MembershipController::class, 'indexCriteria'])->name('admin.membershipCriteria.index');
        Route::post('/membership/criteria/store', [MembershipController::class, 'storeCriteria'])->name('admin.membershipCriteria.store');
        Route::put('/membership/criteria/update/{id}', [MembershipController::class, 'updateCriteria'])->name('admin.membershipCriteria.update');
        
        //Mentorship Controller
        Route::get('/mentorship/index', [MentorshipController::class, 'index'])->name('admin.mentorship.index');
        Route::post('/mentorship/store', [MentorshipController::class, 'store'])->name('admin.mentorship.store');
        Route::put('/mentorship/update/{id}', [MentorshipController::class, 'update'])->name('admin.mentorship.update');
        
        //Facilitator Controller
        Route::get('/facilitator/index', [FacilitatorController::class, 'index'])->name('admin.facilitator.index');
        Route::post('/facilitator/store', [FacilitatorController::class, 'store'])->name('admin.facilitator.store');
        Route::put('/facilitator/update/{id}', [FacilitatorController::class, 'update'])->name('admin.facilitator.update');
        
       
       
        //  Privacy
        Route::get('/index/privacypolicy', [PrivacyController::class, 'index'])->name('admin.privacyPolicy.index');
        Route::post('/store/privacypolicy', [PrivacyController::class, 'store'])->name('admin.privacy.store');
        Route::put('/update/privacypolicy/{id}', [PrivacyController::class, 'update'])->name('admin.privacy.update');
        
        //consent
        Route::get('/index/consent', [PrivacyController::class, 'consentIndex'])->name('admin.consent.index');
        Route::post('/store/consent', [PrivacyController::class, 'consentStore'])->name('admin.consent.store');
        Route::put('/update/consent/{id}', [PrivacyController::class, 'consentUpdate'])->name('admin.consent.update');
        //Career

        //Terms Conditions
        Route::get('/terms/conditions', [TermsConditionController::class, 'index'])->name('admin.termsCondition.index');
        Route::post('/terms/conditions/store/', [TermsConditionController::class, 'store'])->name('admin.termsCondition.store');
        Route::put('/terms/conditions/update/{id}', [TermsConditionController::class, 'update'])->name('admin.termsCondition.update');
          
        //Events
        Route::get('events/index', [EventController::class, 'index'])->name('admin.event.index');
        Route::get('events/create', [EventController::class, 'create'])->name('admin.event.create');
        Route::post('events/store', [EventController::class, 'store'])->name('admin.event.store');
        Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
        Route::put('/events/{id}', [EventController::class, 'update'])->name('admin.event.update');
        Route::get('/events/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

        //Livestream
        Route::get('livestream/index', [LivestreamController::class, 'index'])->name('admin.livestream.index');
        Route::get('livestream/create', [LivestreamController::class, 'create'])->name('admin.livestream.create');
        Route::post('livestream/store', [LivestreamController::class, 'store'])->name('admin.livestream.store');
        Route::get('/livestream/{id}/edit', [LivestreamController::class, 'edit'])->name('admin.livestream.edit');
        Route::put('/livestream/{id}', [LivestreamController::class, 'update'])->name('admin.livestream.update');
        Route::get('/livestream/{id}', [LivestreamController::class, 'destroy'])->name('admin.livestream.destroy');

       
        //Blog 
        Route::get('blog/index', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('post/blog', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::get('blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
        
        //Resource
        Route::get('resource/index', [ResourceController::class, 'index'])->name('admin.resource.index');
        Route::get('resource/create', [ResourceController::class, 'create'])->name('admin.resource.create');
        Route::post('post/resource', [ResourceController::class, 'store'])->name('admin.resource.store');
        Route::get('resource/{id}/edit', [ResourceController::class, 'edit'])->name('admin.resource.edit');
        Route::put('resource/{id}', [ResourceController::class, 'update'])->name('admin.resource.update');
        Route::get('resource/{id}', [ResourceController::class, 'destroy'])->name('admin.resource.destroy');
        Route::get('resource/{id}/details', [ResourceController::class, 'details'])->name('resource.details');
       
        
       //CoreActivitiesController
        Route::get('core-activities/index', [CoreActivitiesController::class, 'index'])->name('admin.coreActivities.index');
        Route::get('core-activities/create', [CoreActivitiesController::class, 'create'])->name('admin.coreActivities.create');
        Route::post('core-activities/store', [CoreActivitiesController::class, 'store'])->name('admin.coreActivities.store');
        Route::get('core-activities/{id}/edit', [CoreActivitiesController::class, 'edit'])->name('admin.coreActivities.edit');
        Route::put('core-activities/{id}', [CoreActivitiesController::class, 'update'])->name('admin.coreActivities.update');
        Route::get('core-activities/{id}', [CoreActivitiesController::class, 'destroy'])->name('admin.coreActivities.destroy');
        
        //Testimonials
        Route::get('testimonials/index', [TestimonialsController::class, 'index'])->name('admin.testimonials.index');
        Route::get('testimonials/create', [TestimonialsController::class, 'create'])->name('admin.testimonials.create');
        Route::post('testimonials/post', [TestimonialsController::class, 'store'])->name('admin.testimonials.store');
        Route::get('testimonials/{id}/edit', [TestimonialsController::class, 'edit'])->name('admin.testimonials.edit');
        Route::put('testimonials/{id}/post', [TestimonialsController::class, 'update'])->name('admin.testimonials.update');
        Route::get('testimonials/{id}', [TestimonialsController::class, 'destroy'])->name('admin.testimonials.destroy');


        //Faqs
        Route::get('faq/index', [FAQController::class, 'index'])->name('admin.faq.index');
        Route::get('faq/create', [FAQController::class, 'create'])->name('admin.faq.create');
        Route::post('post/faq', [FAQController::class, 'store'])->name('admin.faq.store');
        Route::get('faq/{id}/edit', [FAQController::class, 'edit'])->name('admin.faq.edit');
        Route::put('faq/{id}', [FAQController::class, 'update'])->name('admin.faq.update');
        Route::get('faq/{id}', [FAQController::class, 'destroy'])->name('admin.faq.destroy');
        Route::get('faq/submt/form', [FAQController::class, 'submtFormView'])->name('admin.faq.submtForm');
        Route::get('/faq/form/view/{id}', [FAQController::class, 'submitFormShow'])->name('admin.faq.submitForm.show');
        Route::get('/faq/form/destroy/{id}', [FAQController::class, 'submitFormDestroy'])->name('admin.faq.submitForm.destroy');

        //Contact
        Route::get('/contact-form/index', [ContactFormController::class, 'index'])->name('admin.contactForm.index');
        Route::get('/contact-form/show/{id}', [ContactFormController::class, 'show'])->name('admin.contactForm.show');
        Route::get('/contact-form/destroy/{id}', [ContactFormController::class, 'destroy'])->name('admin.contactForm.destroy');
       
       

        

        
    });  
});
Route::get('/role-update/respond/{token}', [UserController::class, 'showResponseForm'])->name('admin.role-update.response-form');
Route::post('/role-update/respond/{token}', [UserController::class, 'processResponse'])
            ->name('admin.role-update.process-response');