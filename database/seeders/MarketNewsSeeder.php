<?php

namespace Database\Seeders;

use App\Models\MarketNewsArticle;
use Illuminate\Database\Seeder;

class MarketNewsSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Masharket Agreement Signing',
                'slug' => 'agreement-signing',
                'image_path' => 'market/news/mshrkt1.jpg',
                'excerpt' => "On 13th July 2023 Media Pros Africa CEO Wangeci Murage and Mr. Trésor Senga, Festival Director of Mashariki African Film Festival, came together to sign a groundbreaking agreement.",
                'body' => "On 13th July 2023 Media Pros Africa CEO Wangeci Murage and Mr. Trésor Senga, Festival Director of Mashariki African Film Festival, came together to sign a groundbreaking agreement while attending the just concluded Zanzibar International Film Festival. This collaboration aims to showcase captivating African content to the global audience at the upcoming film festival in Kigali, Rwanda.\n\nDuring the signing, the team from Media Pros Africa and Mashariki African Film Festival was joined by the Director, Multichoice Talent Factory East Africa, Victoria Goro; The Festival Director Kwetu International Animation Film Festival, Mr. Daniel Nyalusi; Dr. Zippy Okoth, KCA University and Festival Director Lake International Pan African Film Festival; Mudamba Mudamba of East African Docubox and Lionel Kayitare of Mashariki African Film Festival.\n\nStay tuned for further updates and announcements as we reveal more information about this highly anticipated event.",
                'published_at' => '2023-07-13',
            ],
            [
                'title' => "Launching MashaRket's Website and Registration Platform",
                'slug' => 'launching-website-and-registration-platform',
                'image_path' => 'market/news/logo.png',
                'excerpt' => 'The Mashariki African Film Festival (MAAFF) and Media Pros Africa (MPA) are proud to announce the unveiling of the MashaRket official website and registration portal.',
                'body' => "The Mashariki African Film Festival (MAAFF) and Media Pros Africa (MPA) are proud to announce the unveiling of the MashaRket - Kigali International Content Market official website and registration portal, a platform set to be the convergence point for global media stakeholders to network, exchange insights and transact.\n\nBuilding upon the success of eight editions of the Mashariki African Film Festival (MAAFF) and one of Africa's top Distribution Networks, Media Pros Africa (MPA), this partnership opens up opportunities for growth particularly for African filmmakers and content creators.\n\nKey features include seamless delegate registration, multiple payment platforms, a travel guide for international delegates, and efficient meeting pre-booking through the platform's calendar feature.\n\nMashaRket is the first content market hosted by MAAFF, creating opportunities for sales, networking, and long-term relationships between local and international industry stakeholders.",
                'published_at' => '2023-10-01',
            ],
            [
                'title' => "Local Filmmakers to Benefit from Mashariki's New Platform",
                'slug' => 'local-filmmakers-to-benefit',
                'image_path' => 'market/news/presslaunchteam.jpg',
                'excerpt' => 'Local filmmakers are in for a treat as the Mashariki Film Festival returns with new additions that will take it to the international arena.',
                'body' => "Local filmmakers are in for a treat as the Mashariki Film Festival returns with new additions that will not only enhance the local film industry but also take it to the international arena.\n\nThe annual festival will attract influential players in the film industry from around the world, all of whom will participate in Mashariki's new platform dubbed Masharket, according to Mashariki African Film Festival's Executive Director Trésor Senga.\n\nHe explained that Mashariki will launch Masharket, the first film market in Rwanda, aiming to connect local writers, filmmakers and other stakeholders with investors who will support their art and distribute locally produced films on major platforms.\n\nLionel Kayitare, Masharket's program manager, explains that the platform was conceived as a means to expand the market for local films and create opportunities for many who lack the support to turn good ideas into reality.",
                'published_at' => '2023-10-12',
            ],
            [
                'title' => 'A Game-Changing Content Market',
                'slug' => 'a-game-changing-content-market',
                'image_path' => 'market/news/newsletter.jpeg',
                'excerpt' => 'An update on the recently concluded press conference for MashaRket, a groundbreaking content market event set to reshape the entertainment industry.',
                'body' => "We are thrilled to share an update on the recently concluded press conference for MashaRket, a groundbreaking content market event set to reshape the entertainment industry. The event was a remarkable success, boasting a diverse audience of media professionals, industry enthusiasts, and stakeholders.\n\nMashaRket is set to revolutionize the entertainment landscape during the Mashariki African Film Festival, becoming a pivotal platform for the acquisition and exchange of audiovisual content and emerging media.\n\nCore partnerships with production companies, distributors, and streaming platforms were highlighted, underscoring the event's collaborative approach. MashaRket also emphasized networking opportunities for attendees and exhibitors, and introduced a virtual attendance option enabling global participation.",
                'published_at' => '2023-10-15',
            ],
            [
                'title' => 'Hatangijwe Iserukiramuco rya Mashariki African Film Festival',
                'slug' => 'hatangijwe-iserukiramuco',
                'image_path' => 'market/news/im078-2526871700995242.jpg',
                'excerpt' => "Umunyamabanga wa Leta kuri Minisitiri y'Urubyiruko, Sandrine Umutoni yatangije ku mugaragaro iserukiramuco mpuzamahanga 'Mashariki African Film Festival'.",
                'body' => "Umunyamabanga wa Leta kuri Minisitiri y'Urubyiruko, Sandrine Umutoni yatangije ku mugaragaro iserukiramuco mpuzamahanga 'Mashariki African Film Festival' rigiye kubera i Kigali muri Kigali Conference and Exhibition Village ahazwi nka Camp Kigali.\n\nWitabiriwe n'abo mu bihugu bitandukanye byo ku Isi bakora ibijyanye na sinema, abahagarariye imiryango itegamiye kuri Leta, ibigo by'ubucuruzi bikorera mu Rwanda, abakinnyi ba filime, n'abanyeshuri bari kwimenyereza umwuga wa sinema.\n\nUmuyobozi wa Mashariki African Film Festival, Bwana Trésor Senga, yashimiye abitabiriye itangizwa ry'iri serukiramuco, avuga ko iyi ari intambwe ikomeye sinema Nyarwanda yamaze gutera.\n\nUmuhuzabikorwa w'iri serukiramuco, Lionel Kayitare, avuga ko iki gikorwa kizahurizwa hamwe n'imurikagurisha ry'ibikorwa byerekeranye na Sinema bise 'Masharket'.",
                'published_at' => '2023-11-25',
            ],
            [
                'title' => 'Mashariki Film Festival: Appel au Bon Usage des Plateformes',
                'slug' => 'appel-au-bon-usage-des-plateformes',
                'image_path' => 'market/news/MASHARIKI-participants-.jpg',
                'excerpt' => "La secrétaire d'État au ministère rwandais de la jeunesse, Sandrine Umutoni, a lancé un appel aux cinéastes à faire bon usage des plateformes comme le festival du cinéma.",
                'body' => "La secrétaire d'État au ministère rwandais de la jeunesse, Sandrine Umutoni, a lancé un appel aux cinéastes à faire bon usage des plateformes comme le festival du cinéma. Selon elle, elles peuvent servir de catalyseurs pour réaliser leur potentiel.\n\nMme Umutoni a félicité les cinéastes pour leur contribution au progrès du cinéma en Afrique, les invitant à travailler ensemble pour aller plus loin.\n\nLe coordinateur du festival, Lionel Kayitare, a fait savoir que ce festival est une occasion de mettre en place une plateforme considérée comme un marché générateur de revenus pour les cinéastes.\n\nDes projections cinématographiques, des ateliers, et des tables rondes de classe mondiale figurent parmi les activités prévues.",
                'published_at' => '2023-11-26',
            ],
            [
                'title' => 'Mashariki Film Festival Underway in Kigali',
                'slug' => 'mashariki-film-festival-underway',
                'image_path' => 'market/news/35063.jpg',
                'excerpt' => 'The ninth edition of Mashariki African Film Festival is underway in Kigali, where films are lined up to be showcased throughout the week.',
                'body' => "The ninth edition of Mashariki African Film Festival is underway in Kigali, where good films are lined up to be showcased on the festival's big screens throughout the week.\n\nThe festival kicked off at Kigali Conference and Exhibition Village (KCEV) and attracted key players in the film industry from the country and international guests.\n\nGiving her remarks at the opening ceremony, State Minister Sandrine Umutoni emphasized the cultural bridge's role in uniting audiences worldwide and strengthening connections among filmmakers, the African diaspora, and international media producers.\n\nAccording to Executive Director Lionel Kayitare, the ninth edition is unique with special additions, among them Masharket — the first film market in Rwanda, aiming to connect local writers and filmmakers with investors who will support their art and distribute locally produced films.\n\nA total of 72 films were selected for screening at this year's festival across three categories: long feature, best documentary, and best short film.",
                'published_at' => '2023-11-27',
            ],
        ];

        foreach ($articles as $article) {
            $article['body'] = collect(explode("\n\n", $article['body']))
                ->map(fn ($paragraph) => '<p>'.e($paragraph).'</p>')
                ->implode('');

            MarketNewsArticle::query()->firstOrCreate(['slug' => $article['slug']], $article);
        }
    }
}
