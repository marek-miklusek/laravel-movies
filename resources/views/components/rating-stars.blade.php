<div id="dropdown" class="z-10 hidden justify-center items-center">
    <div x-data="{ 
            rating: 0, hoverRating: 0,
            ratings: [{'amount': 1, 'label':'Terrible'}, {'amount': 2, 'label':'Bad'}, {'amount': 3, 'label':'Good'}, {'amount': 4, 'label':'Great'}, {'amount': 5, 'label':'Fantastic'}],
            rate(amount) {
                if (this.rating == amount) {
                    this.rating = 0;
                }
                else this.rating = amount;
            },
            currentLabel() {
                let r = this.rating;
                if (this.hoverRating != this.rating) r = this.hoverRating;
                let i = this.ratings.findIndex(e => e.amount == r);
                if (i >=0) {return this.ratings[i].label;} else {return ''};     
            }
        }"  class="flex flex-col items-center justify-center rounded p-1 bg-[#333]">
        <div class="flex">
            <template x-for="(star, index) in ratings" :key="index">
                <a @click="rate(star.amount); window.location.href = '{{ route('rating', $title) }}/?amount=' + star.label" 
                    @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
                    aria-hidden="true" :title="star.label"
                    class="text-gray-400 p-1 w-10 cursor-pointer"
                    :class="{'text-yellow-300': hoverRating >= star.amount, 'text-[#FFD700]': rating >= star.amount && hoverRating >= star.amount}">
                    <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </a>
            </template>
        </div>
        <div class="p-2 text-white font-semibold">
            <template x-if="rating || hoverRating">
                <p x-text="currentLabel()"></p>
            </template>
            <template x-if="!rating && !hoverRating">
                <p>Please Rate!</p>
            </template>
        </div>
    </div>
</div>





