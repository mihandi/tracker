<script setup>
import {onMounted, ref} from "vue";
import {useRouter} from 'vue-router'

const router = useRouter()
onMounted(async () => getHabit());
onMounted(async () => getCategories());

const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

let form = ref({
    id: '',
    name: '',
    description: '',
    category_id: '',
})

const getHabit = async () => {
    let response = await axios.get("/api/getHabit/" + props.id);
    form.value = response.data.habit;

    // habit.value = response.data.habit
    // console.log('habit', habit.value);
}

let categories = ref([]);

const getCategories = async () => {
    let response = await axios.get("/api/getCategories");
    categories.value = response.data.categories
    console.log('categories', categories.value);
}

const updateHabit = () => {
    const formData = new FormData()
    formData.append('name', form.value.name);
    formData.append('description', form.value.description);
    formData.append('category_id', form.value.category_id);

    console.log(formData);
    debugger;
    axios.post('/api/editHabit/' + form.value.id, formData)
        .then((response) => {
            form.value.name = '';
            form.value.description = '';
            form.value.category_id = '';

            router.push('/habits/');
        }).catch((error) => {

    })
}
</script>
<template>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="products__edit ">

                            <div class="products__create__titlebar dflex justify-content-between align-items-center">
                                <div class="products__create__titlebar--item">

                                    <h1 class="my-1">Edit Habit</h1>
                                </div>
                                <div class="products__create__titlebar--item">

                                    <button class="btn btn-secondary ml-1" @click="updateHabit()">
                                        Save
                                    </button>
                                </div>
                            </div>

                            <div class="products__create__cardWrapper mt-2">
                                <div class="products__create__main">
                                    <div class="products__create__main--addInfo card py-2 px-2 bg-white">
                                        <p class="mb-1">Name</p>
                                        <input type="text" class="input" v-model="form.name">

                                        <p class="my-1">Description (optional)</p>
                                        <textarea cols="10" rows="5" class="textarea"
                                                  v-model="form.description"></textarea>

                                    </div>

                                </div>
                                <div class="products__create__sidebar">
                                    <!-- Product Organization -->
                                    <div class="card py-2 px-2 bg-white">

                                        <!-- Product unit -->
                                        <div class="my-3">
                                            <p>Category</p>
                                            <select v-model="form.category_id">
                                                <option v-for="item in categories"
                                                        v-if="categories.length > 0"
                                                        v-bind:value="item.id"
                                                >
                                                    {{ item.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <hr>
                                    </div>

                                </div>
                            </div>
                            <!-- Footer Bar -->
                            <div class="dflex justify-content-between align-items-center my-3">
                                <p></p>
                                <button class="btn btn-secondary" @click="updateHabit()">Save</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
