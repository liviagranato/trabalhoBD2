<?php

namespace Jikan\Lib\Parser;

use Jikan\Model\Schedule as ScheduleModel;

/**
 * Class ScheduleParse
 *
 * @package Jikan\Lib\Parser
 */
class ScheduleParse extends TemplateParse
{

    private $return = [];

    /**
     * @return Array
     */
    public function parse(): Array
    {

        $this->model = new ScheduleModel();


        /*
         * Rules
         */

        $this->addRule(
            'monday',
            '~<div class="anime-header">Monday</div>~',
            function () {
                $this->model->set('Schedule', 'monday', $this->parseTo('<div class="anime-header">Tuesday</div>'));
            }
        );

        $this->addRule(
            'tuesday',
            '~<div class="anime-header">Tuesday</div>~',
            function () {
                $this->model->set('Schedule', 'tuesday', $this->parseTo('<div class="anime-header">Wednesday</div>'));
            }
        );

        $this->addRule(
            'wednesday',
            '~<div class="anime-header">Wednesday</div>~',
            function () {
                $this->model->set('Schedule', 'wednesday', $this->parseTo('<div class="anime-header">Thursday</div>'));
            }
        );

        $this->addRule(
            'thursday',
            '~<div class="anime-header">Thursday</div>~',
            function () {
                $this->model->set('Schedule', 'thursday', $this->parseTo('<div class="anime-header">Friday</div>'));
            }
        );

        $this->addRule(
            'friday',
            '~<div class="anime-header">Friday</div>~',
            function () {
                $this->model->set('Schedule', 'friday', $this->parseTo('<div class="anime-header">Saturday</div>'));
            }
        );

        $this->addRule(
            'saturday',
            '~<div class="anime-header">Saturday</div>~',
            function () {
                $this->model->set('Schedule', 'saturday', $this->parseTo('<div class="anime-header">Sunday</div>'));
            }
        );

        $this->addRule(
            'sunday',
            '~<div class="anime-header">Sunday</div>~',
            function () {
                $this->model->set('Schedule', 'sunday', $this->parseTo('<div style="clear:both;"></div>'));
            }
        );


        /*
         * Parsing
         */

        foreach ($this->file as $lineNo => $line) {
            $this->line = $line;
            $this->lineNo = $lineNo;

            $this->find();
        }

        return (array)$this->model;
    }


    /**
     * @param $next
     *
     * @return array
     */
    private function parseTo($next): array
    {
        $i = 1;
        $seasonal = [];

        while (true) {
            if (preg_match('~'.$next.'~', $this->file[$this->lineNo + $i])) {
                break;
            }

            if (preg_match('~<div class="seasonal-anime (.*?)"~', $this->file[$this->lineNo + $i], $this->matches)) {
                $anime = [
                    'mal_id'       => null,
                    'url'          => null,
                    'title'        => null,
                    'image_url'    => null,
                    'synopsis'     => null,
                    'producer'     => [],
                    'licensor'     => [],
                    'episodes'     => null,
                    'source'       => null,
                    'genre'        => [],
                    'airing_start' => null,
                    'score'        => null,
                    'members'      => null,
                    'kids'         => false,
                    'r18_plus'     => false,
                ];

                $anime['kids'] = strpos($this->matches[1], 'kids') ? true : false;
                $anime['r18_plus'] = strpos($this->matches[1], 'r18') ? true : false;

                $i += 3;
                preg_match(
                    '~<a href="(https://myanimelist.net/anime/(.*)/(.*))" class="link-title">(.*)</a>~',
                    $this->file[$this->lineNo + $i],
                    $this->matches
                );


                $anime['mal_id'] = (int)$this->matches[2];
                $anime['url'] = $this->matches[1];
                $anime['title'] = $this->matches[4];

                $i += 5;
                preg_match('~<span class="producer">(.*)</span>~', $this->file[$this->lineNo + $i], $this->matches);
                $producers = explode('</a>', $this->matches[1]);
                foreach ($producers as $key => $value) {
                    if (preg_match('~<a href="/(.*)" title="(.*)">([\s\S]*)(</a>|)~', $value)) {
                        preg_match('~<a href="/(.*)" title="(.*)">([\s\S]*)(</a>|)~', $value, $this->matches);
                        $anime['producer'][] = [
                            'url'  => BASE_URL.$this->matches[1],
                            'name' => strip_tags($this->matches[2]),
                        ];
                    }
                }

                $i += 2;
                preg_match(
                    '~<a href="(.*)"><span>(.*) ep(s|)</span>~',
                    $this->file[$this->lineNo + $i],
                    $this->matches
                );
                $anime['episodes'] = $this->matches[2] == '?' ? null : (int)$this->matches[2];

                $i += 4;
                preg_match('~<span class="source">(.*)</span>~', $this->file[$this->lineNo + $i], $this->matches);
                $anime['source'] = $this->matches[1];

                $i += 5;
                if (preg_match('~<div class="genres js-genre"~', $this->file[$this->lineNo + $i])) {
                    while (true) {
                        if (preg_match('~<div class="image">~', $this->file[$this->lineNo + $i])) {
                            break;
                        }
                        if (preg_match(
                            '~<a href="/(.*)" title="(.*)">(.*)</a>~',
                            $this->file[$this->lineNo + $i],
                            $this->matches
                        )) {
                            $anime['genre'][] = [
                                'url'  => BASE_URL.$this->matches[1],
                                'name' => $this->matches[3],
                            ];
                        }
                        $i++;
                    }
                }

                if (preg_match(
                        '~<div class="image"><img width="(.*?) height="(.*?)" alt="(.*?) data-src="(.*?)" data-srcset="(.*?)" class="lazyload" />~',
                        $this->file[$this->lineNo + $i],
                        $this->matches
                    ) ||
                    preg_match(
                        '~<img src="(.*?)" width="(.*?)" height="(.*?)" alt="(.*?)" srcset="(.*?)" />~',
                        $this->file[$this->lineNo + $i],
                        $this->matches
                    )
                ) {
                    $anime['image_url'] = trim(substr(explode(',', $this->matches[5])[1], 0, -3));
                }

                while (!preg_match('~<div class="synopsis js-synopsis">~', $this->file[$this->lineNo + $i])) {
                    $i++;
                } // haxing MAL's inconsistencies

                $i++;
                $synopsis = '';
                if (preg_match('~<span class="preline">~', $this->file[$this->lineNo + $i])) {
                    while (true) {
                        if (preg_match('~<p class="licensors"~', $this->file[$this->lineNo + $i])) {
                            break;
                        }

                        $synopsis .= $this->file[$this->lineNo + $i];

                        $i++;
                    }


                    $anime['synopsis'] = trim(htmlspecialchars_decode(strip_tags($synopsis)));
                }

                if (preg_match(
                    '~<p class="licensors" data-licensors="(.*?)"></p>~',
                    $this->file[$this->lineNo + $i],
                    $this->matches
                )) {
                    $licensors = explode(',', $this->matches[1]);
                    foreach ($licensors as $key => $value) {
                        $value = trim($value);

                        if (!empty($value)) {
                            $anime['licensor'][] = $value;
                        }
                    }
                }

                while (!preg_match('~<span class="remain-time">~', $this->file[$this->lineNo + $i])) {
                    $i++;
                } // haxing MAL's inconsistencies

                $i++;
                $anime['airing_start'] = trim(strip_tags($this->file[$this->lineNo + $i]));

                while (!preg_match('~<span class="member fl-r" title="Members">~', $this->file[$this->lineNo + $i])) {
                    $i++;
                } // haxing MAL's inconsistencies
                $i++;
                $anime['members'] = (int)trim(str_replace(',', '', $this->file[$this->lineNo + $i]));

                while (!preg_match('~<span class="score" title="Score">~', $this->file[$this->lineNo + $i])) {
                    $i++;
                } // haxing MAL's inconsistencies
                $i++;
                $anime['score'] = trim($this->file[$this->lineNo + $i]) == 'N/A' ? null : (float)trim(
                    $this->file[$this->lineNo + $i]
                );

                $seasonal[] = $anime;
            }

            $i++;
        }

        return $seasonal;
    }
}
