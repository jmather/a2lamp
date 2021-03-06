<? $this->load->view('global/header_view'); ?>

<? if ( !empty($topics) ) : ?>
    <div class="row">
        <div class="ten columns">
            <h2>Current Topics</h2>
        </div>
        
        <div class="two columns">
            <?= anchor('topics/create', 'Submit a topic', array( 'class' => 'small button' )) ?>
        </div>
    </div>

    <? foreach ( $topics as $topic ) : ?>
        <div class="row">
            <div class="twelve columns">
                <div class="topic">
                    <? if ( isset($topic->user_voted) && $topic->user_voted === true ) : ?>
                        <a href="#" class="remove-vote" data-topicid="<?= $topic->id ?>">
                            <span class="icon up-arrow"></span>
                        </a>
                    <? elseif ( $user ) : ?>
                        <a href="#" class="add-vote" data-topicid="<?= $topic->id ?>">
                            <span class="icon up-arrow"></span>
                        </a>
                    <? else : ?>
                        <a href="#" class="log-in-popup" title="Log in to vote up topics">
                            <span class="icon up-arrow"></span>
                        </a>
                    <? endif; ?>
                    
                    <div class="topic-info">
                        <h3><?= anchor('topic/' . $topic->id, $topic->title) ?></h3>                    
                    
                        <ul class="inline-list topic-meta">
                            <li>
                                <div class="author-photo" style="background-image:url(<?= $topic->author_photo ?>)"></div>
                                <?= anchor($topic->author_link, $topic->author_name, array( 'class' => 'author-name' )) ?>
                            </li>
                            <li><?= date('M. j, Y', strtotime($topic->created)) ?></li>
                            <li><?= $topic->votes ?> votes</li>
                        </ul>
                        
                        <p class="description">
                            <? if ( strlen($topic->description) > 200 ) : ?>
                                <span class="short-description">
                                    <?= character_limiter($topic->description, 200, '&hellip;<a href="#" class="read-more-toggle">read more</a> <i class="icon-caret-down"></i>') ?>
                                </span>
                                <span class="full-description hidden">
                                    <?= nl2br($topic->description) ?> 
                                    <a href="#" class="read-more-toggle">collapse</a> <i class="icon-caret-up"></i>
                                </span>
                            <? else : ?>
                                <?= nl2br($topic->description) ?>
                            <? endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
<? else : ?>
    <div class="row">
        <div class="twelve columns">
            <h2>No topics found</h2>
            <h3 class="subheader"><?= anchor('/topic/create', 'Click here') ?> to create a topic!</h3>
        </div>
    </div>
<? endif; ?>

<? $this->load->view('global/footer_view'); ?>