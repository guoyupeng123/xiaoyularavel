<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotify extends Notification
{
    use Queueable;

    protected $comment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
//    构造方法接收观察者传过来的数据
    public function __construct($comment){
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        return ['mail'];
        return ['database'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //这里 return 数据会记录到数据表 notifications 中 data 字段中
        return [
            'user_id'=>$this->comment->user->id,//谁发表的评论
            'user_name'=>$this->comment->user->name,//发表评论的用户名字
            'user_icon'=>$this->comment->user->icon,//发表评论的用户头像
            'user_content'=>$this->comment->content,//发表评论的用户内容
            'article_id'=>$this->comment->article->id,//评论的文章的id
            'article_title'=>$this->comment->article->title,//评论的文章的标题
//          组合消息通知返回路径
//          'link'=>route('home.article.show',$this->comment->article).'#comment'.$this->comment->id,
//          在article模型里面定义了一个getLink方法
            'link'=>$this->comment->article->getLink('#comment'.$this->comment->id)
        ];
    }
}
