<template>
    <div class="form-group">
        <select class="form-control input-group-sm" v-model="selected" @change="$emit('select-changed', { name: name, value: selected })">
            <option value="" disabled selected>Select {{name}}</option> ....
            <option v-for="option in options" :value="option.value">{{ option.text }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props: ['options', 'name'],
        data: () => ({
            selected: null
        })
    }
</script>
