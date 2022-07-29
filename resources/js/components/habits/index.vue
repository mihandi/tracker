<script setup>
import {onMounted, ref} from "vue";
import {useRouter} from 'vue-router'

const router = useRouter()

onMounted(async () => getHabits());

let habits = ref([]);

const getHabits = async () => {
    let response = await axios.get("/api/getHabits");
    habits.value = response.data.habits
    console.log('habits', habits.value);
}

const newHabit = () => {
    router.push('/habit/create')
}

const updateHabit = (id) => {
    router.push('/habit/update/' + id)
}

const deleteHabit = (id) => {
    axios.get('/api/deleteHabit/' + id)
        .then( ()=> {
            getHabits();
        }).catch(() => {

    });
}

</script>
<template>
    <h1>Habits list</h1>
    <div class="container">
        <div class="products__list table  my-3">

            <div class="customers__titlebar dflex justify-content-between align-items-center">

                <div class="customers__titlebar--item">
                    <button class="btn btn-secondary my-1" @click="newHabit()">
                        Add Habit
                    </button>
                </div>
            </div>

            <div class="table--heading mt-2 products__list__heading " style="padding-top: 20px;background:#FFF">
                <!-- <p class="table--heading--col1">&#32;</p> -->
                <p class="table--heading--col1">ID</p>
                <p class="table--heading--col2">
                    Habit
                </p>
                <p class="table--heading--col4">Description</p>
                <p class="table--heading--col3">
                    Category
                </p>
                <!-- <p class="table--heading--col5">&#32;</p> -->
                <p class="table--heading--col5">actions</p>
            </div>

            <div class="table--items products__list__item" v-for="item in habits"  key="item.id" v-if="habits.length > 0 ">
                <div class="products__list__item--imgWrapper">
                   <p>{{item.id}}</p>
                </div>
                <a href="# " class="table--items--col2">
                    {{item.name}}
                </a>
                <p class="table--items--col2">
                    {{item.description}}}
                </p><p class="table--items--col3">
                    {{item.category.name }}
                </p>
                <div>
                    <button class="btn-icon btn-icon-success" @click="updateHabit(item.id)">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn-icon btn-icon-danger"  @click="deleteHabit(item.id)">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
            </div>
            <div class="table--items products__list__item" v-else>
                <h1>NOTHING FOUND</h1>
            </div>
        </div>
    </div>
</template>
