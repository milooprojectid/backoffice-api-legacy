<template>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div :class="generateColor">
            <span class="info-box-icon"><i :class="generateIcon"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{name}}</span>
                <span class="info-box-number">{{value}}</span>

                <div class="progress">
                    <div class="progress-bar" :style="{width: `${progress}%`}"></div>
                </div>
                <span class="progress-description">
                    <slot></slot>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name', 'value', 'color', 'icon', 'progress'],
        computed:{
            generateIcon(){
                return `fa fa-${this.icon}`;
            },
            generateColor(){
                return `info-box bg-${this.color}`
            }
        }
    }
</script>
