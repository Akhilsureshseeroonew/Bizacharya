<?php

namespace Database\Seeders;

use App\Models\Associate;
use App\Models\Event;
use App\Models\JobOpening;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Post;
use App\Models\Sector;
use App\Models\Service;
use App\Models\SuccessStory;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DesignContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedUser();
        $this->seedPages();
        $this->seedMenuItems();
        $this->seedSectors();
        $this->seedServices();
        $this->seedSuccessStories();
        $this->seedEvents();
        $this->seedJobs();
        $this->seedPosts();
        $this->seedVideos();
    }

    protected function seedUser(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bizacharya.com'],
            ['name' => 'Bizacharya Admin', 'password' => bcrypt('password'), 'is_admin' => true]
        );
    }

    protected function seedPages(): void
    {
        Page::updateOrCreate(['slug' => 'home'], [
            'template' => 'home',
            'title' => 'Home',
            'menu_label' => 'Home',
            'seo_title' => 'Company Registration & Business Consulting Kerala | Bizacharya',
            'seo_description' => 'Get expert Company registration, GST filing, business consulting, and startup compliance in Kerala. Trusted guidance to help entrepreneurs launch, grow, and scale.',
            'hero_heading' => "Kerala\u{2019}s Entrepreneurship<br><span class=\"hero__heading-accent\">Development Platform</span>",
            'hero_lead' => "Whether you're an aspiring entrepreneur, startup founder, SME/MSME owner, or established business, Bizacharya provides expert business consulting, startup support, legal and regulatory compliance, and strategic guidance to help you launch, grow, and scale with confidence.",
            'journey_steps' => [
                ['value' => 'Discover', 'text' => 'Identify strengths and business opportunities.'],
                ['value' => 'Learn', 'text' => 'Entrepreneurship training and mentorship.'],
                ['value' => 'Register', 'text' => 'Business formation and compliance.'],
                ['value' => 'Finance', 'text' => 'Access funding and financial support.'],
                ['value' => 'Grow', 'text' => 'Build, scale and strengthen your business.'],
                ['value' => 'Scale', 'text' => 'Branding, technology, and market expansion.'],
            ],
            'vision_text' => "To build India\u{2019}s leading entrepreneurship ecosystem that empowers businesses to start, grow, and succeed.",
            'mission_text' => 'To help entrepreneurs transform ideas into successful businesses through expert guidance, business registration, funding support, and sustainable growth strategies.',
            'hero_stats' => [
                ['value' => 'Guiding', 'text' => 'Entrepreneurs'],
                ['value' => 'Building', 'text' => 'Stronger Businesses'],
                ['value' => 'Creating', 'text' => 'Opportunities'],
                ['value' => 'For a Brighter', 'text' => 'Kerala'],
            ],
            'vm_words' => ['People', 'Business', 'A Stronger Kerala'],
            'news_heading' => "Building Kerala's Largest Entrepreneurship Community",
            'is_published' => true,
        ]);

        Page::updateOrCreate(['slug' => 'about'], [
            'template' => 'about',
            'title' => 'About',
            'menu_label' => 'About',
            'seo_title' => 'About Bizacharya | Kerala Entrepreneurship Ecosystem',
            'seo_description' => "Bizacharya began as a corporate business consulting firm and has grown into Kerala's entrepreneurship development platform.",
            'hero_heading' => "From Corporate Consulting to Kerala's <span class=\"listing-accent\">Entrepreneurship Ecosystem</span>",
            'hero_lead' => 'Bizacharya began as a specialized corporate business consulting firm, serving organizations across the BFSI sector. Over the years, we partnered with 54+ NBFCs, Small Finance Banks, Cooperative Institutions, and Financial Organizations, helping them establish, strengthen, and scale their operations through strategic consulting and regulatory excellence.',
            'body' => "<p class=\"know__lead\">Bizacharya has now expanded its mission beyond corporate advisory. Today, we are building one of Kerala's most comprehensive entrepreneurship ecosystems&mdash;designed to help individuals confidently start, manage, scale, and sustain successful businesses.</p><hr class=\"know__rule\"><p class=\"know__text\">Our integrated platform brings together business consulting, expert mentoring, regulatory support, funding guidance, technology solutions, market access, branding, leadership development, and implementation support, all under one roof. Unlike conventional consulting firms, Bizacharya partners with businesses from idea validation and business registration to funding, compliance, expansion, and long-term growth, helping entrepreneurs build sustainable, successful enterprises.</p>",
            'timeline' => [
                ['value' => '17+ Years', 'text' => 'Business Consulting & Advisory Experience'],
                ['value' => '54+ Financial Institutions', 'text' => 'Consulting experience across NBFCs, banks, cooperatives and financial organizations.'],
                ['value' => "\u{20B9}30,000+ Crore", 'text' => 'Combined AUM of organizations supported.'],
                ['value' => 'Today', 'text' => 'Building an integrated entrepreneurship ecosystem for aspiring entrepreneurs, startups, SMEs/MSMEs and established businesses.'],
            ],
            'audience' => [
                'Aspiring Entrepreneurs', 'Startups', 'SME/MSMEs', 'Women Entrepreneurs',
                'Farmers & Agri-Businesses', 'Students & Working Professionals', 'Business Owners', 'Investors & Family Businesses',
            ],
            'expertise' => [
                'NBFC, Small Finance Bank & Cooperative Institution Consulting',
                'RBI, SEBI, MCA & FEMA Compliance',
                'Business Strategy & Corporate Transformation',
                'Core Banking System (CBS) Implementation',
                'Digital Transformation & IT Solutions',
                'Financial Planning, Funding & Capital Structuring',
                'Governance, Risk Management & Operational Excellence',
                'Process Re-engineering & Organizational Development',
            ],
            'leader_initials' => 'AG',
            'leader_name' => 'Dr. Ajayghosh G',
            'leader_title' => 'Managing Director',
            'leader_role' => 'Managing Director, Bizacharya Consulting Pvt. Ltd.',
            'leader_bio' => "<p>Dr. Ajayghosh G is the visionary behind Bizacharya Consulting Pvt. Ltd., building one of India's most impactful entrepreneurship ecosystems to help individuals create sustainable businesses and long-term economic value.</p><p>With over 17 years of leadership across banking, NBFCs, cooperative finance, fintech, regulatory compliance, and business transformation, he brings a rare blend of strategic thinking, regulatory expertise, and practical business insight. He holds a Doctorate in Banking &amp; Finance and is a Certified Independent Director from the Indian Institute of Corporate Affairs (IICA), Ministry of Corporate Affairs, Government of India \u{2014} credentials that anchor Bizacharya's focus on strong governance, financial discipline, and ethical leadership.</p>",
            'leader_badges' => ['Doctorate in Banking & Finance', 'Certified Independent Director, IICA'],
            'leader_bio_more' => "<p>He has advised and supported 54+ financial institutions and corporate organizations, contributing to the transformation of businesses managing a combined AUM of over \u{20B9}30,000 crore giving him deep, practical understanding of the financial ecosystem and how to guide entrepreneurs through every stage of their journey.</p><p>Under his leadership, Bizacharya has grown into an integrated entrepreneurship development platform \u{2014} rooted in Kerala, serving entrepreneurs nationally \u{2014} offering end-to-end support across ideation, company formation, statutory registrations, regulatory compliance, funding readiness, technology, branding, digital transformation, market access, and long-term mentoring for startups, SME/MSMEs, women entrepreneurs, farmers, and professionals.</p><p class=\"mb-0\">Dr. Ajayghosh sees entrepreneurship as the most powerful catalyst for employment and nation-building, with a vision to make Bizacharya India's most trusted entrepreneurship platform.</p>",
            'hero_badges' => ['54+ Financial Institutions', "Kerala's Entrepreneurship Ecosystem"],
            'accent_words' => ['Strategy', 'People', 'Growth'],
            'know_badge' => '8 Entrepreneur Segments Empowered',
            'cta_chain' => ['Idea Validation', 'Business Registration', 'Funding', 'Compliance', 'Expansion', 'Long-Term Growth'],
            'is_published' => true,
        ]);

        Page::updateOrCreate(['slug' => 'contact'], [
            'template' => 'contact',
            'title' => 'Contact',
            'menu_label' => 'Contact',
            'seo_title' => 'Contact Bizacharya | Business Consulting Kerala',
            'seo_description' => 'Get in touch with Bizacharya for Business consulting, SME/MSME registration, and startup support. Call, WhatsApp, or send an enquiry today.',
            'hero_heading' => "Let's Connect and Build <span class=\"listing-accent\">Your Business Together</span>",
            'hero_lead' => "Whether you're planning to start a new business, grow an existing enterprise, or simply need expert guidance, the Bizacharya team is here to help. Reach out to us with your enquiries, and we'll be happy to assist you on your entrepreneurial journey.",
            'facts_heading' => [['value' => "We'd Love to", 'text' => 'Hear From You']],
            'is_published' => true,
        ]);
    }

    protected function seedMenuItems(): void
    {
        $header = [
            ['position' => 'before', 'label' => 'Home', 'url' => '/', 'is_active' => true, 'sort_order' => 1],
            ['position' => 'before', 'label' => 'About', 'url' => '/about', 'is_active' => true, 'sort_order' => 2],
            ['position' => 'after', 'label' => 'Learning Hub', 'url' => '/learning-hub', 'is_active' => false, 'sort_order' => 1],
            ['position' => 'after', 'label' => 'Community', 'url' => '/community', 'is_active' => true, 'sort_order' => 2],
            ['position' => 'after', 'label' => 'Success Stories', 'url' => '/success-stories', 'is_active' => false, 'sort_order' => 3],
            ['position' => 'after', 'label' => 'Careers', 'url' => '/careers', 'is_active' => true, 'sort_order' => 4],
            ['position' => 'after', 'label' => 'Contact', 'url' => '/contact', 'is_active' => true, 'sort_order' => 5],
        ];

        foreach ($header as $item) {
            MenuItem::updateOrCreate(['menu' => 'header', 'label' => $item['label']], $item + ['menu' => 'header']);
        }

        $footer = [
            ['label' => 'Home', 'url' => '/', 'sort_order' => 1],
            ['label' => 'About', 'url' => '/about', 'sort_order' => 2],
            ['label' => 'Learning Hub', 'url' => '/learning-hub', 'sort_order' => 3],
            ['label' => 'Community', 'url' => '/community', 'sort_order' => 4],
            ['label' => 'Success Stories', 'url' => '/success-stories', 'sort_order' => 5],
            ['label' => 'Careers', 'url' => '/careers', 'sort_order' => 6],
            ['label' => 'Contact', 'url' => '/contact', 'sort_order' => 7],
        ];

        foreach ($footer as $item) {
            MenuItem::updateOrCreate(['menu' => 'footer_quick_links', 'label' => $item['label']], $item + ['menu' => 'footer_quick_links', 'is_active' => true, 'position' => 'after']);
        }
    }

    protected function seedSectors(): void
    {
        $sectors = [
            [
                'slug' => 'financial-services', 'title' => 'Financial Services', 'sort_order' => 1, 'image' => 'sectors/01-financial-services.jpg',
                'summary' => 'Guiding entrepreneurs to build successful businesses in loan facilitation, insurance services, and financial ventures.',
                'hero_heading' => 'Build a successful Financial Services Business',
                'hero_lead' => 'Guiding entrepreneurs to build successful businesses in loan facilitation, insurance services, and financial ventures.',
                'intro' => "<h2>Expert Support for a Growing Sector</h2><p class=\"lead\">The financial services sector offers tremendous opportunities for entrepreneurs who want to build sustainable businesses while helping individuals and businesses achieve financial well-being.</p><p>At Bizacharya, we help aspiring entrepreneurs establish and grow financial services businesses across Kerala through expert guidance, business planning, compliance support, branding, and business development strategies.</p><p>Whether you're planning to offer financial consultancy, loan facilitation, insurance services, investment awareness, or financial literacy initiatives, we help you build a strong foundation for long-term success.</p>",
                'services_offered' => ['Financial consultancy setup guidance', 'Loan facilitation business support', 'Insurance services business development', 'Investment awareness program consulting', 'Financial literacy initiative planning', 'Business registration and compliance', 'Branding and marketing support', 'Continuous mentoring and growth strategy'],
                'who_can_benefit' => ['Finance Professionals', 'Graduates', 'Aspiring Financial Advisors', 'Business Consultants', 'Entrepreneurs'],
                'statement_quote' => 'Build a trusted financial services business in Kerala with expert guidance from Bizacharya.',
                'cta_label' => 'Start Your Financial Services Business',
            ],
            [
                'slug' => 'agri-business', 'title' => 'Agri-Business & Value Addition', 'sort_order' => 2, 'image' => 'sectors/02-agri-business.jpg',
                'summary' => 'Turn agricultural produce into profitable ventures with expert guidance on processing and agri-business development.',
                'hero_heading' => 'Transform Agricultural Produce into Profitable Businesses',
                'hero_lead' => 'Turn agricultural produce into profitable ventures with expert guidance on processing and agri-business development.',
                'intro' => "<p class=\"lead\">At Bizacharya, we help entrepreneurs create value from agricultural produce by turning raw materials into high-quality, market-ready products. Whether you're planning to start a food processing unit, spice business, coconut-based enterprise, dairy product brand, millet products, herbal products, or any other value-added venture, our experts provide the guidance you need to build a successful business.</p><p>From identifying profitable opportunities to business registration, compliance, branding, packaging, funding readiness, and market access, we support you at every stage of your entrepreneurial journey.</p>",
                'services_offered' => ['Business opportunity identification', 'Business planning and mentoring', 'Business registration and compliance', 'Funding readiness', 'Branding and packaging support', 'Market access strategies', 'Business growth consulting'],
                'who_can_benefit' => ['Farmers', 'Farmer Producer Organizations (FPOs)', 'Food Processing Entrepreneurs', 'Women Entrepreneurs', 'Rural Enterprises'],
                'statement_quote' => 'Turn agricultural potential into a profitable business with Bizacharya.',
                'cta_label' => 'Start Your Agri-Business Journey',
            ],
            [
                'slug' => 'rural-enterprises', 'title' => 'Rural Enterprises', 'sort_order' => 3, 'image' => 'sectors/03-rural-enterprises.jpg',
                'summary' => 'Build sustainable, community-driven businesses with funding access and mentorship support.',
                'hero_heading' => 'Build Sustainable Rural Enterprises in Kerala',
                'hero_lead' => 'Build sustainable, community-driven businesses with funding access and mentorship support.',
                'services_offered' => ['Rural business opportunity identification', 'Self-Help Group (SHG) business mentoring', 'Cottage industry and handicraft business support', 'Business registration and compliance', 'Funding readiness and government scheme guidance', 'Branding and digital marketing', 'Market linkage and distribution support', 'Business growth consulting'],
                'who_can_benefit' => ['Rural Youth', 'Farmers', 'Self-Help Groups (SHGs)', 'Community Entrepreneurs', 'Village-Based Enterprises', 'Handicraft & Cottage Industry Owners'],
                'statement_quote' => 'Create a rural business in Kerala that makes a lasting impact on your community.',
                'cta_label' => 'Start Your Rural Enterprise',
            ],
            [
                'slug' => 'women-entrepreneurship', 'title' => 'Women Entrepreneurship', 'sort_order' => 4, 'image' => 'sectors/04-women-entrepreneurship.jpg',
                'summary' => 'Empowering women entrepreneurs with training, mentorship, and funding to start and lead successful businesses.',
                'hero_heading' => 'Women Entrepreneurship Support in Kerala',
                'hero_lead' => 'Empowering women entrepreneurs with training, mentorship, and funding to start and lead successful businesses.',
                'intro' => "<p class=\"lead\">Every successful business begins with confidence and the right support. At Bizacharya, we empower women entrepreneurs across Kerala by helping them transform their skills, creativity, and ideas into sustainable businesses.</p><p>Whether you're starting a home-based food business, boutique or tailoring venture, beauty and wellness business, handicraft enterprise, retail business, manufacturing unit, or professional service, we provide complete business guidance from idea to growth.</p>",
                'services_offered' => ['Women entrepreneurship mentoring', 'Home-based and small business setup guidance', 'Business registration and compliance', 'Funding readiness and women-focused scheme guidance', 'Branding and digital marketing', 'Market access support', 'Business development and growth support'],
                'who_can_benefit' => ['Homemakers', 'Students', 'Working Professionals', 'Women Self-Help Groups (SHGs)', 'Aspiring Women Entrepreneurs'],
                'statement_quote' => 'Take the first step towards building your own successful business in Kerala.',
                'cta_label' => 'Start Your Women Entrepreneurship Journey',
            ],
            [
                'slug' => 'startup-development', 'title' => 'Startup Development', 'sort_order' => 5, 'image' => 'sectors/05-startup-development.jpg',
                'summary' => 'End-to-end support for startups — from registration and compliance to funding and growth strategy.',
                'hero_heading' => 'Startup Development & Consulting in Kerala',
                'hero_lead' => 'End-to-end support for startups — from registration and compliance to funding and growth strategy.',
                'services_offered' => ['Startup mentoring', 'Business model development', 'Company registration', 'Compliance support', 'Startup funding readiness', 'Branding and marketing', 'Technology enablement', 'Growth strategy'],
                'who_can_benefit' => ['Startup Founders', 'Students', 'Innovators', 'Technology Entrepreneurs', 'First-Time Business Owners'],
                'statement_quote' => 'Launch your startup in Kerala with confidence, build for long-term success with Bizacharya.',
                'cta_label' => 'Start Your Startup Journey',
            ],
            [
                'slug' => 'sme-msme-development', 'title' => 'SME/MSME Development', 'sort_order' => 6, 'image' => 'sectors/06-sme-msme.jpg',
                'summary' => 'Helping SME/MSMEs register, stay compliant, and grow with expert guidance every step of the way.',
                'hero_heading' => 'SME/MSME Registration & Development Consulting in Kerala',
                'hero_lead' => 'Helping SME/MSMEs register, stay compliant, and grow with expert guidance every step of the way.',
                'services_offered' => ['MSME/SME registration', 'Business consulting', 'Compliance management', 'Funding readiness', 'Branding and digital marketing', 'Technology adoption', 'Market access', 'Business mentoring'],
                'who_can_benefit' => ['New MSME/SME Registrants', 'Existing SME/MSMEs', 'Manufacturing Businesses', 'Service Enterprises', 'Retail Businesses'],
                'statement_quote' => 'Register your SME/MSME and strengthen your business in Kerala with expert consulting from Bizacharya.',
                'cta_label' => 'Register Your SME/MSME',
            ],
        ];

        foreach ($sectors as $s) {
            Sector::updateOrCreate(['slug' => $s['slug']], $s + ['is_published' => true]);
        }
    }

    protected function seedServices(): void
    {
        $services = [
            [
                'slug' => 'entrepreneurship-training', 'title' => 'Entrepreneurship Training', 'sort_order' => 1, 'image' => 'services/01-training.jpg',
                'summary' => 'Build the practical skills and business knowledge needed to launch and grow a successful venture.',
                'hero_heading' => 'Entrepreneurship Training Programs',
                'hero_lead' => 'Build the practical skills and business knowledge needed to launch and grow a successful venture.',
                'intro' => '<p class="lead">A successful business starts with the right knowledge and practical skills. At Bizacharya, our entrepreneurship training programs are designed to equip aspiring entrepreneurs across Kerala with the confidence and expertise needed to start, manage, and grow successful businesses.</p><p>Our training combines practical learning, real-world business insights, and expert mentorship, helping participants understand every stage of the entrepreneurial journey—from identifying opportunities to scaling a business.</p>',
                'what_we_offer' => ['Entrepreneurship development programs', 'Business planning workshops', 'Startup training and bootcamps', 'Industry-specific training', 'Practical business mentoring', 'Financial and business management awareness'],
                'impact_quote' => 'Bizacharya has delivered a wide range of training programs, helping hundreds of aspiring entrepreneurs gain the practical skills and confidence needed to build sustainable businesses.',
            ],
            [
                'slug' => 'business-registration', 'title' => 'Business Registration', 'sort_order' => 2, 'image' => 'services/02-registration.jpg',
                'summary' => 'Get expert help with company registration, GST registration, and essential business documentation.',
                'hero_heading' => 'Business Registration Services',
                'hero_lead' => 'Get expert help with company registration, GST registration, and essential business documentation.',
                'intro' => '<p class="lead">Choosing the right legal structure is one of the most important decisions for any business. Bizacharya provides expert guidance to help entrepreneurs across Kerala register their businesses quickly, accurately, and in compliance with applicable regulations.</p><p>Whether you\'re starting a Proprietorship, Partnership, LLP, Private Limited Company, FPO, Cooperative, Trust, or Society, our experts ensure a smooth registration process from start to finish.</p>',
                'what_we_offer' => ['Business structure consultation', 'Company and LLP registration', 'FPO, Trust, Society, and Cooperative registration', 'End-to-end registration support', 'Banking, Fintech & NBFC Registration', 'Mergers & Acquisitions'],
                'impact_quote' => 'Bizacharya has helped entrepreneurs across Kerala successfully complete business registrations, establishing legally compliant businesses with confidence and peace of mind.',
            ],
            [
                'slug' => 'compliance', 'title' => 'Legal & Regulatory Compliance', 'sort_order' => 3, 'image' => 'services/03-compliance.jpg',
                'summary' => 'Stay compliant with tax, legal, and regulatory requirements through expert SME/ MSME and startup compliance guidance.',
                'hero_heading' => 'Legal & Regulatory Compliance Services',
                'hero_lead' => 'Stay compliant with tax, legal, and regulatory requirements through expert SME/ MSME and startup compliance guidance.',
                'intro' => '<p class="lead">Managing regulatory requirements can be complex and time-consuming. Bizacharya helps businesses across Kerala stay compliant with statutory and regulatory obligations, allowing entrepreneurs to focus on business growth without unnecessary compliance challenges.</p><p>Our team provides timely guidance on registrations, licences, GST filing, taxation, labour regulations, and ongoing compliance requirements.</p>',
                'what_we_offer' => ['Business compliance consultation', 'Licence and permit assistance', 'GST registration and filing support', 'Tax registration guidance', 'Labour law compliance', 'Regulatory documentation', 'MCA Filing', 'RBI Filing Support', 'SEBI Filing', 'LODR Compliance (Listing Obligations and Disclosure Requirements)'],
                'impact_quote' => 'Bizacharya helps businesses across Kerala reduce compliance risks, maintain regulatory standards, and operate with confidence through reliable, expert-led compliance support.',
            ],
            [
                'slug' => 'funding-readiness', 'title' => 'Funding Readiness', 'sort_order' => 4, 'image' => 'services/04-funding.jpg',
                'summary' => 'Prepare your business to secure loans, investments, and government funding schemes.',
                'hero_heading' => 'Funding Readiness Services',
                'hero_lead' => 'Prepare your business to secure loans, investments, and government funding schemes.',
                'intro' => '<p class="lead">Access to finance starts with proper preparation. Bizacharya helps entrepreneurs across Kerala become funding-ready by strengthening their business plans, financial documents, and overall business strategy before approaching financial institutions or investors.</p><div class="notice" role="note"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><p><strong>Please Note:</strong> Funding approvals are solely at the discretion of the respective banks, financial institutions, investors, or funding agencies.</p></div>',
                'what_we_offer' => ['Business plan preparation', 'Financial projections', 'Project report development', 'Funding documentation support', 'Investment readiness guidance', 'Financial literacy and advisory'],
                'impact_quote' => 'Bizacharya helps entrepreneurs across Kerala present well-prepared, credible business proposals that improve their readiness and opportunities for accessing finance.',
            ],
            [
                'slug' => 'branding-marketing', 'title' => 'Branding & Marketing', 'sort_order' => 5, 'image' => 'services/05-branding.jpg',
                'summary' => 'Build a strong brand identity and reach your target audience with effective digital marketing strategies.',
                'hero_heading' => 'Branding & Marketing Services',
                'hero_lead' => 'Build a strong brand identity and reach your target audience with effective digital marketing strategies.',
                'intro' => '<p class="lead">A strong brand creates recognition, credibility, and lasting customer relationships. At Bizacharya, we help businesses across Kerala build impactful brands that stand out in competitive markets and connect with the right audience.</p><p>From brand identity to digital marketing strategies, we provide practical solutions that strengthen your business presence and accelerate growth.</p>',
                'what_we_offer' => ['Brand strategy and positioning', 'Logo and brand identity guidance', 'Packaging consultation', 'Digital marketing and social media branding', 'Customer acquisition planning'],
                'impact_quote' => 'Bizacharya helps businesses across Kerala create memorable brands, attract more customers, and establish a strong market presence for sustainable growth.',
            ],
            [
                'slug' => 'market-access', 'title' => 'Market Access', 'sort_order' => 6, 'image' => 'services/06-market-access.jpg',
                'summary' => 'Connect your business with the right customers, partners, and new market opportunities.',
                'hero_heading' => 'Market Access & Business Expansion Support',
                'hero_lead' => 'Connect your business with the right customers, partners, and new market opportunities.',
                'intro' => '<p class="lead">Building a great product is only the beginning. Sustainable business growth depends on reaching the right customers and markets. Bizacharya helps entrepreneurs across Kerala identify market opportunities and connect with distribution channels that support long-term success.</p><p>We guide businesses in expanding into institutional markets, retail networks, online marketplaces, and strategic partnerships — both within Kerala and beyond</p>',
                'what_we_offer' => ['Market opportunity assessment', 'Sales channel development', 'Distribution network support', 'Online marketplace guidance', 'Business networking', 'Growth strategy consultation'],
                'impact_quote' => 'Bizacharya helps businesses across Kerala increase market reach, improve customer access, and create new opportunities for sustainable expansion.',
            ],
            [
                'slug' => 'business-mentoring', 'title' => 'Business Mentoring', 'sort_order' => 7, 'image' => 'services/07-mentoring.jpg',
                'summary' => 'Receive ongoing guidance from experienced mentors to overcome challenges and achieve sustainable business growth.',
                'hero_heading' => 'Business Mentoring Services',
                'hero_lead' => 'Receive ongoing guidance from experienced mentors to overcome challenges and achieve sustainable business growth.',
                'intro' => '<p class="lead">Every entrepreneur faces challenges, but the right mentor can make all the difference. Bizacharya provides personalized business mentoring to help entrepreneurs across Kerala make informed decisions, solve business challenges, and achieve long-term success.</p><p>Our experienced mentors work closely with entrepreneurs to provide practical advice on strategy, operations, and growth , offering continuous, hands-on business support at every stage.</p>',
                'what_we_offer' => ['One-to-one business mentoring', 'Business strategy consultation', 'Growth planning', 'Problem-solving support', 'Performance review', 'Long-term business guidance'],
                'impact_quote' => 'We help entrepreneurs build stronger businesses by providing expert guidance, improving decision-making, and supporting sustainable business growth.',
            ],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(['slug' => $s['slug']], $s + ['is_published' => true]);
        }
    }

    protected function seedSuccessStories(): void
    {
        $stories = [
            ['headline' => 'From Homemaker to Business Owner', 'name' => 'Home-based food products', 'location' => 'Thrissur', 'featured' => true, 'avatar_label' => 'Portrait of a woman entrepreneur', 'quote' => 'With guidance from Bizacharya, I transformed my passion for homemade food products into a registered business. Today, my products reach customers across Kerala through retail outlets and online platforms. The mentorship, branding support, and business planning provided by Bizacharya gave me the confidence to grow my dream into reality.'],
            ['headline' => 'Building an Agri Enterprise', 'name' => 'Value-added agri products', 'location' => 'Palakkad', 'featured' => true, 'avatar_label' => 'Portrait of a farmer-entrepreneur', 'quote' => "I always wanted to expand beyond traditional farming but wasn't sure where to begin. Bizacharya helped me identify opportunities in value-added agricultural products, prepare a business plan, and understand market requirements. Today, my enterprise supplies packaged products to regional distributors and continues to grow."],
            ['headline' => 'A Startup Registered in Weeks, Not Months', 'name' => 'SaaS startup founder', 'location' => 'Kochi', 'featured' => true, 'avatar_label' => 'Portrait of a startup founder', 'quote' => 'Choosing the right structure, company registration and compliance were all handled with clarity. We could focus on building the product while Bizacharya guided the paperwork.'],
            ['headline' => 'Funding-Ready with a Credible Project Report', 'name' => 'Small manufacturing unit', 'location' => 'Kozhikode', 'featured' => true, 'avatar_label' => 'Portrait of a manufacturing entrepreneur', 'quote' => 'The project report and financial projections prepared with Bizacharya gave our bank discussions a professional footing. We understood our own numbers better than ever before.'],
            ['headline' => 'A Financial Consultancy Built on Trust', 'name' => 'Loan facilitation business', 'location' => 'Kollam', 'featured' => false, 'avatar_label' => 'Portrait of a financial advisor', 'quote' => 'From compliance to branding, Bizacharya helped me set up a financial services business that clients trust. The ongoing mentoring keeps me focused on sustainable growth.'],
            ['headline' => 'Taking a Rural Handicraft Brand Online', 'name' => 'Handicraft enterprise', 'location' => 'Wayanad', 'featured' => false, 'avatar_label' => 'Portrait of a handicraft artisan', 'quote' => 'Bizacharya connected our self-help group with the right marketplaces and helped us with branding and packaging. Our products now travel far beyond our village.'],
        ];

        foreach ($stories as $i => $s) {
            SuccessStory::updateOrCreate(
                ['headline' => $s['headline']],
                $s + ['sector_tag' => 'Success story', 'is_published' => true, 'sort_order' => $i + 1]
            );
        }
    }

    protected function seedEvents(): void
    {
        $events = [
            [
                'slug' => 'business-plan-workshop-first-time-founders', 'title' => 'Business Plan Workshop for First-Time Founders',
                'status' => 'upcoming', 'tag_label' => 'Workshop', 'filter_category' => 'workshop', 'banner_image' => 'events/business-plan-workshop.jpg', 'event_date' => '2026-10-12', 'event_time' => '9:30 AM – 4:30 PM',
                'venue' => 'Thrissur, Kerala', 'venue_full' => 'First Floor, Athikavil Complex, Urakam, Thrissur, Kerala – 680562',
                'summary' => 'One hands-on day. Bring an idea, leave with a structured business plan, first financial projections and a clear next step.',
                'about_heading' => 'A working session, not a lecture',
                'body' => '<p>A hands-on, one-day workshop for aspiring and first-time founders across Kerala. Bring your business idea and leave with a structured plan: a clear business model, a first set of financial projections and an understanding of what a bank or investor expects to see.</p>',
                'highlights' => ['Validating your idea and identifying the right customer segment', 'Building a simple business model and pricing logic', 'Preparing basic financial projections and a project report outline', 'Choosing a legal structure and understanding first-year compliance', 'Q&A and one-to-one feedback from Bizacharya mentors'],
                'audience' => ['Aspiring entrepreneurs', 'Students', 'Working professionals planning a venture', 'Early-stage founders who want to formalise their plan'],
            ],
            [
                'slug' => 'msme-udyam-registration-webinar', 'title' => 'MSME Registration & Udyam: What Every Small Business Should Know',
                'status' => 'upcoming', 'tag_label' => 'Webinar', 'event_date' => '2026-10-03', 'event_time' => '11:00 AM – 12:00 PM',
                'venue' => 'Online', 'organizer' => 'Bizacharya Consulting Pvt. Ltd.',
                'summary' => 'A free online session on Udyam registration, its benefits, and the compliance basics every SME/MSME owner in Kerala should follow.',
                'body' => '<p>A free online session on Udyam registration, its benefits, and the compliance basics every SME/MSME owner in Kerala should follow.</p>',
            ],
            [
                'slug' => 'bizacharya-community-membership', 'title' => 'Bizacharya Community Membership: What You Get',
                'status' => 'info_only', 'tag_label' => 'Membership', 'venue' => 'Kerala (all districts)',
                'summary' => 'Priority access to mentoring clinics, member-only workshops, networking meetups and curated learning resources for entrepreneurs across Kerala.',
                'body' => '<p>Priority access to mentoring clinics, member-only workshops, networking meetups and curated learning resources for entrepreneurs across Kerala.</p>',
            ],
            [
                'slug' => 'entrepreneurs-meetup-kochi-chapter', 'title' => "Entrepreneurs\u{2019} Meetup — Kochi Chapter",
                'status' => 'upcoming', 'tag_label' => 'Networking Meetup', 'filter_category' => 'meetup', 'event_date' => '2026-10-24', 'event_time' => '6:00 PM – 8:30 PM',
                'venue' => 'Kochi, Kerala', 'venue_full' => 'Co-working space, Kakkanad, Kochi',
                'summary' => 'An evening of open networking for founders, SME owners and professionals at a co-working space in Kakkanad, Kochi.',
                'body' => '<p>An evening of open networking for founders, SME owners and professionals at a co-working space in Kakkanad, Kochi.</p>',
            ],
            [
                'slug' => 'one-to-one-mentoring-clinic-funding', 'title' => 'One-to-One Mentoring Clinic — Funding Readiness',
                'status' => 'upcoming', 'tag_label' => 'Mentoring Session', 'filter_category' => 'mentoring', 'event_date' => '2026-10-18', 'event_time' => 'By appointment',
                'venue' => 'Thrissur, Kerala',
                'summary' => 'Book a 30-minute slot with a Bizacharya mentor to review your business plan, project report and funding documentation.',
                'body' => '<p>Book a 30-minute slot with a Bizacharya mentor to review your business plan, project report and funding documentation.</p>',
            ],
            [
                'slug' => 'women-entrepreneurship-bootcamp-kozhikode', 'title' => 'Women Entrepreneurship Bootcamp — Kozhikode (Highlights)',
                'status' => 'completed', 'tag_label' => 'Bootcamp', 'filter_category' => 'workshop', 'event_date' => '2026-08-30',
                'venue' => 'Kozhikode, Kerala', 'registration_open' => false,
                'summary' => 'Highlights, photos and video from our two-day bootcamp for home-based and small business owners in Kozhikode.',
                'body' => '<p>Highlights from our two-day bootcamp for home-based and small business owners in Kozhikode, covering business planning, registration and branding basics.</p>',
            ],
        ];

        foreach ($events as $e) {
            Event::updateOrCreate(['slug' => $e['slug']], $e + ['is_published' => true, 'registration_open' => $e['registration_open'] ?? true]);
        }
    }

    protected function seedJobs(): void
    {
        $jobs = [
            [
                'slug' => 'business-development-executive', 'title' => 'Business Development Executive',
                'department' => 'Business Development', 'location' => 'Thrissur (Head Office)', 'salary_range' => "\u{20B9}3.0 – \u{20B9}4.5 LPA",
                'summary' => 'Connect entrepreneurs, startups and SME/MSMEs across Thrissur and nearby districts with Bizacharya consulting, registration, compliance and funding-readiness services.',
                'description' => 'Bizacharya is looking for a Business Development Executive to connect entrepreneurs, startups and SME/MSMEs across Thrissur and nearby districts with our consulting, registration, compliance and funding-readiness services.',
                'responsibilities' => ['Identify and reach out to aspiring entrepreneurs, startups and small businesses in the assigned territory.', 'Understand client requirements and recommend the right Bizacharya services.', 'Coordinate with the consulting and compliance teams to onboard clients smoothly.', 'Represent Bizacharya at community events, workshops and networking meetups.', 'Maintain accurate records of leads, follow-ups and conversions.'],
                'requirements' => ['Graduate in any discipline; commerce, management or finance preferred.', '1–3 years of experience in sales, banking, NBFC or consulting roles.', 'Strong communication skills in Malayalam and English.', 'Willingness to travel within Kerala.'],
                'benefits' => ['Fixed salary with performance incentives.', 'Structured training on business consulting and compliance basics.', 'Growth path into consulting and team leadership roles.'],
                'posted_at' => '2026-09-15',
            ],
            [
                'slug' => 'compliance-associate', 'title' => 'Compliance Associate',
                'department' => 'Compliance', 'location' => 'Thrissur (Head Office)',
                'summary' => 'Support Bizacharya clients with statutory registrations, filings and ongoing regulatory compliance.',
                'description' => 'Bizacharya is hiring a Compliance Associate to support entrepreneurs and SME/MSME clients with registrations, filings and ongoing regulatory compliance.',
                'responsibilities' => ['Prepare and file statutory registrations (GST, Udyam, company/LLP).', 'Track compliance deadlines for client businesses.', 'Liaise with government departments and portals on clients\' behalf.'],
                'requirements' => ['Commerce/law graduate or equivalent experience.', 'Familiarity with GST, MCA and Udyam processes.', 'High attention to detail.'],
                'benefits' => ['Fixed salary with performance incentives.', 'Hands-on training in regulatory compliance.'],
                'posted_at' => '2026-09-10',
            ],
            [
                'slug' => 'digital-marketing-executive', 'title' => 'Digital Marketing Executive',
                'department' => 'Digital Marketing', 'location' => 'Kochi',
                'summary' => 'Run Bizacharya\'s digital marketing and support branding projects for client businesses.',
                'description' => "Bizacharya is looking for a Digital Marketing Executive to manage our own digital presence and support branding & marketing projects for client businesses.",
                'responsibilities' => ["Manage Bizacharya's social media and content calendar.", 'Support client branding and digital marketing engagements.', 'Track campaign performance and report on results.'],
                'requirements' => ['1–2 years of digital marketing experience.', 'Working knowledge of social media platforms and basic design tools.'],
                'benefits' => ['Fixed salary with performance incentives.', 'Exposure to client branding projects across sectors.'],
                'posted_at' => '2026-09-05',
            ],
            [
                'slug' => 'entrepreneurship-trainer', 'title' => 'Entrepreneurship Trainer',
                'department' => 'Training', 'location' => 'Kozhikode',
                'summary' => 'Deliver entrepreneurship training sessions and workshops for aspiring business owners across Kerala.',
                'description' => 'Bizacharya is hiring an Entrepreneurship Trainer to deliver training sessions and workshops for aspiring business owners across Kerala.',
                'responsibilities' => ['Deliver entrepreneurship training sessions and workshops.', 'Develop and update training content and materials.', 'Mentor participants through business plan development.'],
                'requirements' => ['Experience in training, teaching or business mentoring.', 'Strong presentation and facilitation skills.'],
                'benefits' => ['Fixed salary with performance incentives.', 'Opportunity to shape the Bizacharya training curriculum.'],
                'posted_at' => '2026-08-28',
            ],
        ];

        foreach ($jobs as $j) {
            JobOpening::updateOrCreate(['slug' => $j['slug']], $j + ['is_open' => true]);
        }
    }

    protected function seedPosts(): void
    {
        Post::updateOrCreate(['slug' => '5-questions-before-you-register-a-company-in-kerala'], [
            'category' => 'blog',
            'title' => '5 Questions to Answer Before You Register a Company in Kerala',
            'excerpt' => 'Ownership, liability, tax and funding considerations that decide the right legal structure for your venture.',
            'body' => "<p class=\"lead\">Ownership, liability, tax and funding considerations decide the right legal structure for your venture. Before you file anything, answer these five questions with your co-founders and advisor.</p><h2>1. Who owns the business, and how will that change?</h2><p>A sole proprietorship is the simplest structure, but the moment you plan to bring in a partner, an investor or a family member as a stakeholder, the ownership story changes. Partnerships, LLPs and Private Limited Companies each handle ownership, profit-sharing and exits differently.</p><h2>2. How much personal liability can you carry?</h2><p>In a proprietorship or traditional partnership, business debts are personal debts. An LLP or Private Limited Company creates a separate legal entity, which matters as soon as you take loans, sign supplier contracts or hire staff.</p><h2>3. Will you raise funds — and from whom?</h2><p>Banks are comfortable lending to most registered structures with a credible project report. Equity investors, incubators and many government startup schemes expect a Private Limited Company. Decide your funding route before you decide your structure.</p><h2>4. What compliance rhythm can you sustain?</h2><ul class=\"checklist\"><li><svg class=\"icon\" viewBox=\"0 0 24 24\" aria-hidden=\"true\" focusable=\"false\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m9 12 2 2 4-4\"/></svg>Proprietorship: minimal filings, GST and income tax as applicable.</li><li><svg class=\"icon\" viewBox=\"0 0 24 24\" aria-hidden=\"true\" focusable=\"false\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m9 12 2 2 4-4\"/></svg>LLP: annual returns and statement of accounts with the MCA.</li><li><svg class=\"icon\" viewBox=\"0 0 24 24\" aria-hidden=\"true\" focusable=\"false\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><path d=\"m9 12 2 2 4-4\"/></svg>Private Limited Company: board meetings, annual filings, audits and statutory registers.</li></ul><h2>5. Where will the business be five years from now?</h2><p>Converting from one structure to another later is possible but costly. If you expect to scale, hire and expand beyond Kerala, choose the structure that fits the destination, not just the starting point.</p><p>Bizacharya's Business Registration team helps entrepreneurs across Kerala work through exactly these questions before filing. Send us an enquiry to get started.</p>",
            'date_label' => '14 Sep 2026', 'read_time' => '6 min read', 'published_at' => '2026-09-14', 'is_published' => true, 'sort_order' => 1,
        ]);

        Post::updateOrCreate(['slug' => 'funding-ready-business-plan'], [
            'category' => 'blog',
            'title' => 'What a Funding-Ready Business Plan Actually Looks Like',
            'excerpt' => 'The sections banks and investors read first, and the mistakes that get plans rejected.',
            'body' => '<p class="lead">The sections banks and investors read first, and the mistakes that get plans rejected.</p><h2>Start with the numbers a lender actually checks</h2><p>Most rejected project reports fail on realistic revenue assumptions, not on the idea itself. Lead with a conservative sales forecast, a clear cost structure, and a break-even point you can defend in conversation.</p><h2>Show you understand your own cash cycle</h2><p>A profitable business on paper can still run out of cash. Include a monthly cash-flow projection for at least the first year, and be ready to explain how you will bridge any gaps.</p><h2>Keep the legal and compliance picture clean</h2><p>Lenders and investors want to see that registration, licences and basic compliance are either done or clearly planned for, not an afterthought.</p><p>Bizacharya\'s Funding Readiness team helps entrepreneurs across Kerala prepare exactly this kind of bank-ready plan.</p>',
            'date_label' => '4 Sep 2026', 'read_time' => '5 min read', 'published_at' => '2026-09-04', 'is_published' => true, 'sort_order' => 2,
        ]);

        Post::updateOrCreate(['slug' => 'startup-compliance-checklist-first-12-months'], [
            'category' => 'guide',
            'title' => 'Startup Compliance Checklist for the First 12 Months',
            'excerpt' => 'A downloadable month-by-month checklist covering registrations, filings and renewals.',
            'date_label' => 'Updated Aug 2026', 'published_at' => '2026-08-01', 'is_published' => true, 'sort_order' => 3,
        ]);

        Post::updateOrCreate(['slug' => 'pmegp-subsidised-loans-new-micro-enterprises'], [
            'category' => 'scheme',
            'title' => 'PMEGP: Subsidised Loans for New Micro Enterprises',
            'excerpt' => "Eligibility, subsidy levels and how to apply under the Prime Minister's Employment Generation Programme.",
            'external_url' => 'https://www.kviconline.gov.in/pmegpeportal/',
            'date_label' => 'Updated Aug 2026', 'published_at' => '2026-08-01', 'is_published' => true, 'sort_order' => 4,
        ]);

        Post::updateOrCreate(['slug' => 'kerala-startup-mission-support'], [
            'category' => 'scheme',
            'title' => 'Kerala Startup Mission: Support for Early-Stage Startups',
            'excerpt' => 'Recognition, seed funding and incubation support available to startups registered in Kerala.',
            'external_url' => 'https://startupmission.kerala.gov.in/',
            'date_label' => 'Updated Jul 2026', 'published_at' => '2026-07-01', 'is_published' => true, 'sort_order' => 5,
        ]);

        Post::updateOrCreate(['slug' => 'understanding-working-capital-small-businesses'], [
            'category' => 'literacy',
            'title' => 'Understanding Working Capital for Small Businesses',
            'excerpt' => 'A short video on cash cycles, inventory and why profitable businesses still run out of cash.',
            'video_youtube_id' => 'VIDEO_ID_7',
            'date_label' => '22 Jul 2026', 'published_at' => '2026-07-22', 'is_published' => true, 'sort_order' => 6,
        ]);
    }

    protected function seedVideos(): void
    {
        $videos = [
            ['title' => 'How to Choose the Right Business Structure in Kerala', 'youtube_id' => 'VIDEO_ID_1', 'duration' => '12:40', 'description' => 'Proprietorship, Partnership, LLP or Private Limited — a plain-language comparison.'],
            ['title' => 'Udyam (MSME) Registration Explained', 'youtube_id' => 'VIDEO_ID_2', 'duration' => '08:15', 'description' => 'Who should register, what you need, and the benefits available to registered MSMEs.'],
            ['title' => 'Preparing a Bank-Ready Project Report', 'youtube_id' => 'VIDEO_ID_3', 'duration' => '15:02', 'description' => 'What lenders look for and how to structure your financial projections.'],
            ['title' => 'GST Basics for Small Businesses', 'youtube_id' => 'VIDEO_ID_4', 'duration' => '10:27', 'description' => 'Thresholds, registration and the monthly filing rhythm for new businesses.'],
            ['title' => 'Branding on a Small Budget', 'youtube_id' => 'VIDEO_ID_5', 'duration' => '09:48', 'description' => 'Practical brand identity and packaging tips for food and retail startups.'],
            ['title' => 'From Farm to Shelf: Value Addition Ideas', 'youtube_id' => 'VIDEO_ID_6', 'duration' => '13:11', 'description' => 'Coconut, spice, millet and dairy product ideas with real market demand in Kerala.'],
        ];

        foreach ($videos as $i => $v) {
            Video::updateOrCreate(['title' => $v['title']], $v + ['is_published' => true, 'sort_order' => $i + 1]);
        }
    }
}
