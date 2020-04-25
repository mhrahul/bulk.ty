<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body">
    <h3>Recent Posts Sent To Buffer</h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover social-accounts">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty ( $data->group_info )): ?>
                    <tr>
                        <td>
                           
                            <?php echo e($group->name); ?>

                            
                        </td>
                        <td>aa</td>
                        <td>aa</td>
                        <td><?php echo e($hd->post_text); ?></td>
                        <td>{$hd->sent_at}</td>
                    </tr>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
                <?php echo e($data->links()); ?>

            </table>
        </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>