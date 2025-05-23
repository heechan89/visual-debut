<?php

namespace BagistoPlus\VisualDebut\Sections;

use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use BagistoPlus\Visual\Settings\Range;

use function BagistoPlus\VisualDebut\_t;
use BagistoPlus\Visual\Settings\Checkbox;
use BagistoPlus\Visual\Sections\LivewireSection;
use BagistoPlus\Visual\Actions\GetProductReviews;
use BagistoPlus\Visual\Actions\StoreProductReview;

class ProductReviews extends LivewireSection
{
    use WithFileUploads;

    protected static string $view = 'shop::sections.product-reviews';

    protected static string $previewImageUrl = 'themes/shop/visual-debut/images/sections/products-reviews.png';

    protected static array $enabledOn = ['product'];

    public $reviews;

    public $page = 0;

    public $canLoadMore = false;

    public $showReviewForm = false;

    public $reviewForm = [
        'rating' => 5,
        'name' => '',
        'title' => '',
        'comment' => '',
        'attachments' => [],
        'file' => []
    ];

    public function updatedReviewFormFile($files)
    {
        $this->validate([
            'reviewForm.file' => 'array',
            'reviewForm.file.*' => 'file|mimetypes:image/*,video/*'
        ], [], ['reviewForm.file.0' => 'attachment']);

        foreach ($files as $file) {
            $this->reviewForm['attachments'][] = $file;
        }
    }

    public function removeAttachment($index)
    {
        unset($this->reviewForm['attachments'][$index]);
        $this->reviewForm['attachments'] = array_values($this->reviewForm['attachments']); // re-index
    }

    public function storeReview()
    {
        app(StoreProductReview::class)->execute(
            $this->context['product']->id,
            $this->reviewForm
        );

        session()->flash('success', trans('shop::app.products.view.reviews.success'));

        $this->showReviewForm = false;
    }

    #[Computed]
    public function showWriteReviewButton(): bool
    {
        return core()->getConfigData('catalog.products.review.customer_review') &&
            (core()->getConfigData('catalog.products.review.guest_review') || auth()->guard('customer')->user());
    }

    #[Computed]
    public function showReviewNameInput(): bool
    {
        return core()->getConfigData('catalog.products.review.guest_review')
            && ! auth()->guard('customer')->user();
    }


    public function mount()
    {
        $this->reviews = collect();
        $this->loadMore();
    }

    public function loadMore()
    {
        $this->page++;
        $newReviews = app(GetProductReviews::class)->execute($this->context['product']->id, ['page' => $this->page]);

        $this->reviews = $this->reviews->merge(collect($newReviews->items())->map(function ($review) {
            $data = $review->resolve();
            $data['initials'] = collect(explode(' ', $data['name']))
                ->map(fn($part) => strtoupper(mb_substr($part, 0, 1)))
                ->join('');

            return $data;
        }));

        $this->canLoadMore = $this->page < $newReviews->lastPage();
    }

    public function getViewData(): array
    {
        $reviewHelper = app(\Webkul\Product\Helpers\Review::class);
        $product = $this->context['product'];

        return [
            'totalReviews' => $reviewHelper->getTotalReviews($product),
            'avgRatings' => $reviewHelper->getAverageRating($product),
            'percentageRatings' => $reviewHelper->getPercentageRating($product),
        ];
    }

    public static function name(): string
    {
        return _t('product-reviews.name');
    }

    public static function description(): string
    {
        return _t('product-reviews.description');
    }

    public static function settings(): array
    {
        return [
            Checkbox::make('show_rating_summary', _t('product-reviews.settings.rating_summary_label'))
                ->default(true),

            Checkbox::make('show_reviews', _t('product-reviews.settings.reviews_label'))
                ->default(true),

            Range::make('limit', _t('product-reviews.settings.limit_label'))
                ->min(1)->max(20)->step(1)
                ->default(5),
        ];
    }

    protected static array $default = [
        'settings' => [
            'show_rating_summary' => true,
            'show_reviews'        => true,
            'limit'               => 5,
        ],
    ];
}
