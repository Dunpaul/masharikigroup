<?php

namespace Database\Seeders;

use App\Models\MarketFaq;
use Illuminate\Database\Seeder;

class MarketFaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['q' => 'What is Masharket Content Market, and what is its primary purpose?', 'a' => 'Masharket is a content market hosted at the Mashariki African Film Festival, bringing together film and media stakeholders to buy, sell, and network around audiovisual content.'],
            ['q' => 'How can I register for Masharket Content Market?', 'a' => "To register: go to www.masharket.com, register as an exhibitor, non-exhibitor, or student, enter the details prompted, create your password, and make your payment. You'll receive a confirmation once payment is confirmed."],
            ['q' => 'Who is the target audience for Masharket Content Market?', 'a' => 'All media stakeholders: filmmakers, film enthusiasts, film commissions, content buyers, and content distributors.'],
            ['q' => 'When and where will the Masharket Content Market be held?', 'a' => 'Masharket is held in Kigali, Rwanda at the Kigali Conference and Exhibition Village.'],
            ['q' => 'What categories of content are typically featured at Masharket Content Market?', 'a' => 'All genres of content — feature films, series, animation, formats, sports, and reality.'],
            ['q' => 'Are there opportunities for content pitching or project presentations at Masharket Content Market?', 'a' => 'Yes, there is a pitching masterclass and session.'],
            ['q' => 'What networking events and activities are available during the event?', 'a' => 'Cocktail events, screenings, and B2B and B2C meetings.'],
            ['q' => 'Is there an exhibition area for companies and organizations to promote their products and services?', 'a' => 'Yes — register to be an exhibitor via our website.'],
            ['q' => 'How can I schedule meetings with potential partners or buyers at Masharket Content Market?', 'a' => 'Once you register and pay, you will have access to the meeting booking calendar and to all delegates.'],
            ['q' => 'What are the key benefits of attending Masharket Content Market?', 'a' => "It is a convergence of Anglophone and Francophone Africa, brings together East Africa and the Great Lakes region, and is hosted within a film festival."],
            ['q' => 'What safety measures and health precautions are in place?', 'a' => 'All registered delegates will be required to have a valid health certificate where applicable, and the venue is sanitized ahead of the event.'],
            ['q' => 'What is the cancellation and refund policy for Masharket Content Market registration?', 'a' => 'If you cancel less than a month before the event, you will not be refunded.'],
            ['q' => 'How can I get in touch with the organizers for additional questions or assistance?', 'a' => 'Email us at info@masharket.com.'],
        ];

        foreach ($faqs as $index => $faq) {
            MarketFaq::query()->firstOrCreate(['question' => $faq['q']], [
                'answer' => $faq['a'],
                'sort_order' => $index,
            ]);
        }
    }
}
