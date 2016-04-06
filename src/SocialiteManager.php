<?php

namespace Cali\Socialite;

use InvalidArgumentException;
use Illuminate\Support\Manager;
use Cali\Socialite\One\TwitterProvider;
use Cali\Socialite\One\BitbucketProvider;
use League\OAuth1\Client\Server\Twitter as TwitterServer;
use League\OAuth1\Client\Server\Bitbucket as BitbucketServer;

class SocialiteManager extends Manager implements Contracts\Factory {

    /**
     * Get a driver instance.
     *
     * @param  string $driver
     * @return mixed
     */
    public function with($driver)
    {
        return $this->driver($driver);
    }

    /**
     * Create an instance of Weibo driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createWeiboDriver()
    {
        $config = $this->app['config']['services.weibo'];

        return $this->buildProvider(
            'Cali\Socialite\Two\WeiboProvider', $config
        );
    }

    /**
     * Create an instance of Wechat driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createWechatDriver()
    {
        $config = $this->app['config']['services.wechat'];

        return $this->buildProvider(
            'Cali\Socialite\Two\WechatProvider', $config
        );
    }

    /**
     * Create an instance of QQ driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createQqDriver()
    {
        $config = $this->app['config']['services.qq'];

        return $this->buildProvider(
            'Cali\Socialite\Two\QqProvider', $config
        );
    }

    /**
     * Create an instance of Github driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createGithubDriver()
    {
        $config = $this->app['config']['services.github'];

        return $this->buildProvider(
            'Cali\Socialite\Two\GithubProvider', $config
        );
    }

    /**
     * Create an instance of Facebook driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createFacebookDriver()
    {
        $config = $this->app['config']['services.facebook'];

        return $this->buildProvider(
            'Cali\Socialite\Two\FacebookProvider', $config
        );
    }

    /**
     * Create an instance of Google driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createGoogleDriver()
    {
        $config = $this->app['config']['services.google'];

        return $this->buildProvider(
            'Cali\Socialite\Two\GoogleProvider', $config
        );
    }

    /**
     * Create an instance of LinkedIn driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createLinkedinDriver()
    {
        $config = $this->app['config']['services.linkedin'];

        return $this->buildProvider(
            'Cali\Socialite\Two\LinkedInProvider', $config
        );
    }

    /**
     * Create an instance of Disqus driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createDisqusDriver()
    {
        $config = $this->app['config']['services.disqus'];

        return $this->buildProvider(
            'Cali\Socialite\Two\DisqusProvider', $config
        );
    }

    /**
     * Create an instance of Douban driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createDoubanDriver()
    {
        $config = $this->app['config']['services.douban'];

        return $this->buildProvider(
            'Cali\Socialite\Two\DoubanProvider', $config
        );
    }

    /**
     * Create an instance of Dribbble driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createDribbbleDriver()
    {
        $config = $this->app['config']['services.dribbble'];

        return $this->buildProvider(
            'Cali\Socialite\Two\DribbbleProvider', $config
        );
    }

    /**
     * Create an instance of Slack driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createSlackDriver()
    {
        $config = $this->app['config']['services.slack'];

        return $this->buildProvider(
            'Cali\Socialite\Two\SlackProvider', $config
        );
    }

    /**
     * Create an instance of Spotify driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createSpotifyDriver()
    {
        $config = $this->app['config']['services.spotify'];

        return $this->buildProvider(
            'Cali\Socialite\Two\SpotifyProvider', $config
        );
    }
    
    /**
     * Create an instance of SoundCloud driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createSoundcloudDriver()
    {
        $config = $this->app['config']['services.soundcloud'];

        return $this->buildProvider(
            'Cali\Socialite\Two\SoundCloudProvider', $config
        );
    }

    /**
     * Create an instance of YouTube driver.
     *
     * @return Two\AbstractProvider
     */
    protected function createYoutubeDriver()
    {
        $config = $this->app['config']['services.youtube'];

        return $this->buildProvider(
            'Cali\Socialite\Two\YouTubeProvider', $config
        );
    }

    /**
     * Build an OAuth 2 provider instance.
     *
     * @param  string $provider
     * @param  array  $config
     * @return Two\AbstractProvider
     */
    public function buildProvider($provider, $config)
    {
        return new $provider(
            $this->app['request'], $config['client_id'],
            $config['client_secret'], $config['redirect']
        );
    }

    /**
     * Create an instance of Twitter driver.
     *
     * @return One\AbstractProvider
     */
    protected function createTwitterDriver()
    {
        $config = $this->app['config']['services.twitter'];

        return new TwitterProvider(
            $this->app['request'], new TwitterServer($this->formatConfig($config))
        );
    }

    /**
     * Create an instance of Bitbucket driver.
     *
     * @return One\AbstractProvider
     */
    protected function createBitbucketDriver()
    {
        $config = $this->app['config']['services.bitbucket'];

        return new BitbucketProvider(
            $this->app['request'], new BitbucketServer($this->formatConfig($config))
        );
    }

    /**
     * Format the server configuration.
     *
     * @param  array $config
     * @return array
     */
    public function formatConfig(array $config)
    {
        return array_merge([
            'identifier'   => $config['client_id'],
            'secret'       => $config['client_secret'],
            'callback_uri' => $config['redirect'],
        ], $config);
    }

    /**
     * Get the default driver name.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        throw new InvalidArgumentException('No Socialite driver was specified.');
    }
}
